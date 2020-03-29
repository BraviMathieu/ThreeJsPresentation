<?php
namespace App;


class Form extends \Core\Form
{
    private $button;

    /**
     * @param array $options
     * @param string $value
     * @return array
     */
    private function option(array $options, $value = 'form-control'): array
    {
        $options['class'] =
            (isset($options['class'])) ?
                $options['class'] . ' ' . $value :
                $value;
        return $options;
    }


    /**
     * @param array $options
     * @return string
     */
    public function create(array $options = []) :string
    {
        return $this->open(
            $this->option($options, 'form-horizontal style-form')
        );
    }

    /**
     * @param $name
     * @param array $options
     * @return string
     */
    public function input($name, array $options = []) :string
    {
        if (isset($options['label'])) {
            $label = $options['label'];
            unset($options['label']);
        } else {
            $label = ucfirst($name);
        }
        $options['id'] = 'form-' . $name;
        return '<div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label" for="' . $options['id'] . '">' . $label . ' :</label>
                  <div class="col-sm-10">
                      ' . parent::input($name, $this->option($options)) . '
                  </div>
              </div>';

    }

    /**
     * Crée le bouton submit
     * @param string $text Le texte dans le button submit
     * @return string Un bouton HTML au template de bootstrap en primary color
     */
    public function button(string $text = "Enregistrer"):string
    {
        $this->button = true;
        return '<div class="form-group">
                  <div class="col-sm-2">
                      <button class="btn btn-primary" type="submit">' . $text . '</button>
                  </div>
              </div>';
    }

    public function end()
    {
        if(!$this->button){
            return $this->button() . parent::end();
        }
        return parent::end();
    }


}