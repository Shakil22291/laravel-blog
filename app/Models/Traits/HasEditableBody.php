<?php

namespace App\Models\Traits;

trait HasEditableBody
{
    public function getBodyAsHtml()
    {
        $array = json_decode($this->body, true);
        $blocks = $array['blocks'];
        $output = "";

        foreach ($blocks as $block ) {
            switch ($block['type']) {
                case "paragraph":
                    $output .= $this->getParagraph($block);
                    break;
                case "header":
                    $output .= $this->getHeader($block);
            }
        }

        return $output;
    }

    private function getParagraph($block)
    {
        return "<p> {$block['data']['text']} </p>";
    }

    private function getHeader($block)
    {
        $classes = "";

        switch ($block['data']['level']) {
            case 1:
                $classes = 'text-5xl';
                break;
            case 2:
                $classes = 'text-4xl';
                break;
            case 3:
                $classes = 'text-3xl';
                break;
            case 4:
                $classes = 'text-2xl';
                break;
            case 5:
                $classes = 'text-xl';
                break;
            case 6:
                $classes = 'text-lg';
                break;
        }

        return "
            <h{$block['data']['level']} class='{$classes} font-semilold text-gray-600'>
                 {$block['data']['text']}
            </h{$block['data']['level']}>
        ";
    }
}