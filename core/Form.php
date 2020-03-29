<?php
namespace Core;

class Form
{

    private function attributes(array $data):string
    {
        $attributes = '';
        foreach ($data as $key => $value) {
            if ($value === true) {
                $attributes .= ' ' . $key;
            }elseif ($value) {
                $attributes .= ' ' . $key . '="' . $value . '"';
            }
        }
        return $attributes;
    }

    /**
     * @param array $parameters
     * @return string
     */
    public function open(array $parameters = [])
    {
        $parameters = array_merge([
            'class' => null,
            'method' => 'post',
            'id' => 'form',
            'action' => $_SERVER['PHP_SELF'],
        ], $parameters);
        return '<form ' . $this->attributes($parameters) . '>';
    }

    public function input($name, array $options = [])
    {
        $options = array_merge([
            'class' => null,
            'type' => 'text'
        ], $options);
        return '<input name="' . $name . '" ' . $this->attributes($options) . '>';
    }

    public function button(string $text = "Enregistrer")
    {
        return '<button class="btn btn-theme btn-block" type="submit">' . $text . '</button>';
    }

    public function end()
    {
        return '</form>';
    }




}