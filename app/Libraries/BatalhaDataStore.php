<?php

namespace App\Libraries;

class BatalhaDataStore
{
    private string $path;

    public function __construct()
    {
        $this->path = WRITEPATH . 'data/batalha-do-ceu.json';
        if (! is_dir(dirname($this->path))) {
            mkdir(dirname($this->path), 0775, true);
        }
        if (! file_exists($this->path)) {
            $this->save($this->seedData());
        }
    }

    public function all(): array
    {
        $content = file_get_contents($this->path);
        $decoded = json_decode($content ?: '{}', true);

        return is_array($decoded) ? $decoded : $this->seedData();
    }

    public function save(array $data): void
    {
        file_put_contents($this->path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function section(string $name): array
    {
        $data = $this->all();

        return $data[$name] ?? [];
    }

    public function upsert(string $section, array $item): void
    {
        $data = $this->all();
        $items = $data[$section] ?? [];

        if (empty($item['id'])) {
            $item['id'] = $this->nextId($items);
            $items[] = $item;
        } else {
            foreach ($items as $index => $existing) {
                if ((int) $existing['id'] === (int) $item['id']) {
                    $items[$index] = array_merge($existing, $item);
                }
            }
        }

        $data[$section] = $items;
        $this->save($data);
    }

    public function remove(string $section, int $id): void
    {
        $data = $this->all();
        $items = array_values(array_filter($data[$section] ?? [], static fn ($item) => (int) $item['id'] !== $id));
        $data[$section] = $items;
        $this->save($data);
    }

    public function find(string $section, int $id): ?array
    {
        foreach ($this->section($section) as $item) {
            if ((int) $item['id'] === $id) {
                return $item;
            }
        }

        return null;
    }

    public function ranking(): array
    {
        $mcs = $this->section('mcs');
        usort($mcs, static function ($a, $b) {
            $points = ($b['pontuacao'] ?? 0) <=> ($a['pontuacao'] ?? 0);
            if ($points !== 0) {
                return $points;
            }

            return ($b['titulos'] ?? 0) <=> ($a['titulos'] ?? 0);
        });

        foreach ($mcs as $index => &$mc) {
            $mc['posicao'] = $index + 1;
            $mc['slug'] = url_title($mc['nome_artistico'] ?? 'mc-' . $mc['id'], '-', true) . '-' . $mc['id'];
        }

        return $mcs;
    }

    private function nextId(array $items): int
    {
        $ids = array_column($items, 'id');

        return $ids ? max($ids) + 1 : 1;
    }

    private function seedData(): array
    {
        return [
            'institucional' => [
                'sobre' => 'A Batalha do Céu é um movimento cultural de freestyle rap que ocupa espaços públicos de Santa Bárbara d\'Oeste para fortalecer a arte, a juventude e a cultura hip-hop.',
                'endereco' => 'Praça Central, Santa Bárbara d\'Oeste - SP',
                'instagram' => 'https://instagram.com',
                'youtube' => 'https://youtube.com',
                'banner' => '/img/logo.png',
            ],
            'mcs' => [
                ['id' => 1, 'nome_artistico' => 'MC Orion', 'foto' => '/img/logo.png', 'cidade' => 'Centro', 'bio' => 'Rimas de protesto e técnica afiada.', 'pontuacao' => 320, 'participacoes' => 18, 'vitorias' => 9, 'titulos' => 3],
                ['id' => 2, 'nome_artistico' => 'MC Neblina', 'foto' => '/img/logo.png', 'cidade' => 'Zona Leste', 'bio' => 'Flow veloz e punchlines criativas.', 'pontuacao' => 290, 'participacoes' => 16, 'vitorias' => 7, 'titulos' => 2],
            ],
            'eventos' => [
                ['id' => 1, 'titulo' => 'Batalha do Céu #32', 'data' => date('Y-m-d', strtotime('+10 days')), 'horario' => '19:00', 'local' => 'Praça da Migração', 'descricao' => 'Edição especial com convidados regionais.', 'imagem' => '/img/logo.png'],
                ['id' => 2, 'titulo' => 'Batalha do Céu #31', 'data' => date('Y-m-d', strtotime('-20 days')), 'horario' => '19:00', 'local' => 'Praça da Migração', 'descricao' => 'Noite de eliminação clássica.', 'imagem' => '/img/logo.png'],
            ],
            'edicoes' => [
                ['id' => 1, 'nome' => 'Edição #31', 'data' => date('Y-m-d', strtotime('-20 days')), 'campeao' => 'MC Orion', 'participantes' => 'MC Orion, MC Neblina, MC Sombra', 'observacoes' => 'Recorde de público local.', 'fotos' => '/img/logo.png'],
            ],
            'galeria' => [
                ['id' => 1, 'imagem' => '/img/logo.png', 'legenda' => 'Público lotando a praça', 'referencia' => 'Edição #31'],
            ],
        ];
    }
}
