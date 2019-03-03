<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PersonForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');
        $this->add('name','text',[
            'label' => 'Nome:',
            'rules' => 'required'
        ])
        ->add('birthday','date',[
            'label' => 'Data de Nascimento:',
            'rules' => 'required|date'
        ])
        ->add('genre', 'select', [
            'label' => 'Sexo:',
            'choices' => [
                ''          => 'Selecione...',
                'Feminino'  => 'Feminino',
                'Masculino' => 'Masculino'
            ],
            'rules' => 'required',
        ])
        ->add('postal_code', 'tel', [
            'label' => 'CEP:',
        ])
        ->add('address', 'text', [
            'label' => 'Endereço:',
        ])
        ->add('number', 'number', [
            'label' => 'Nº:',
        ])
        ->add('complement', 'text', [
            'label' => 'Complemento:',
        ])
        ->add('district', 'text', [
            'label' => 'Bairro:',
        ])
        ->add('state', 'text', [
            'label' => 'Estado:',
        ])
        ->add('city', 'text', [
            'label' => 'Cidade:',
        ])
        ->add('send','submit',[
            'label' => 'Salvar',
            'attr' => ['class' => 'btn btn-success btn-block']
        ]);
    }
}














