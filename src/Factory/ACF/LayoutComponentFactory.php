<?php

namespace IM\Fabric\Plugin\TagCloud\Factory\ACF;

use IM\Fabric\Package\FormWrapper\Form\Component;
use IM\Fabric\Package\FormWrapper\Form\Config\ComponentConfig;
use IM\Fabric\Package\FormWrapper\Form\Input;

class LayoutComponentFactory
{
    public function create(string $formKey): Component
    {
        $config = new ComponentConfig($formKey, 'Tag Cloud widget', 'Tag Cloud widget settings');
        $config->setOrder(50);
        $config->setSeamless(false);

        return new Component(
            $config,
            [],
            new Input('Select taxonomy groups', $formKey . '-taxonomy-groups', 'checkbox', [
                'field_type' => 'checkbox',
                'choices' => $this->getTaxonomies(),
                'return_format' => 'value',
                'save_terms' => true,
            ]),
        );
    }

    private function getTaxonomies(): array
    {
        $taxonomies = get_taxonomies([], 'objects');
        return array_map(function ($taxonomy) {
            return $taxonomy->label;
        }, $taxonomies);
    }
}
