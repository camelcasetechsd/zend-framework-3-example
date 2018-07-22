<?php

namespace Product\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

/**
 * This form is used to collect product data.
 */
class ProductForm extends Form
{
    private $categories;

    /**
     * Constructor.
     */
    public function __construct($categories)
    {
        // Define form name
        parent::__construct('product-form');

        $this->categories = $categories;
        // Set POST method for this form
        $this->setAttribute('method', 'post');
        $this->addElements();
        $this->addInputFilter();
    }

    /**
     * This method adds elements to form (input fields and submit button).
     */
    protected function addElements()
    {

        // Add "title" field
        $this->add([
            'type' => 'text',
            'name' => 'title',
            'attributes' => [
                'id' => 'title'
            ],


            'options' => [
                'label' => 'Title',
            ],
        ]);


        // Add "category_id" field
        $this->add([
            'type' => 'number',
            'name' => 'category_id',
            'attributes' => [
                'id' => 'category_id',
            ],

            'options' => [
                'label' => 'Category',
            ],
        ]);


        // Add "Price" field
        $this->add([
            'type' => 'number',
            'name' => 'price',
            'attributes' => [
                'id' => 'Price',
            ],

            'options' => [
                'label' => 'Price',
            ],
        ]);


        /* convert array of objects to array of properties

                                [
                                     '0' => 'French',
                                     '1' => 'English',
                                     '2' => 'Japanese',
                                     '3' => 'Chinese',
                                 ]
        */

        $categoriesForView = [
            '' => '## Select ##'
        ];
        foreach ($this->categories as $category) {
            $categoriesForView[$category->getId()] = $category->getTitle();
        }


        $this->add([
            'type' => 'Select',
            'name' => 'category_id',
            'options' => [
                'label' => 'Category',
                'value_options' => $categoriesForView
            ]
        ]);


        // Add the submit button
        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Save',
                'id' => 'submitbutton',
            ],
        ]);
    }

    /**
     * This method creates input filter (used for form filtering/validation).
     */
    private function addInputFilter()
    {

        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        $inputFilter->add([
            'name' => 'title',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
                ['name' => 'StripNewlines'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 1024
                    ],
                ],
            ],
        ]);


        $inputFilter->add([
            'name' => 'price',
            'required' => true,
            'filters' => [
                ['name' => 'StripTags'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 4096
                    ],
                ],
            ],
        ]);
    }
}
