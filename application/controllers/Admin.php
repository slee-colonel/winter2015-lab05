<?php

class Admin extends Application {

    function __construct() {
        parent::__construct();
        $this->load->helper('formfields');
    }
    
    // displays the quotations in a minimally formatted table by ID, author,
    // mugshot file name, and actual quotation
    function index() {
        $this->data['title'] = 'Quotations Maintenance';
        $this->data['quotes'] = $this->quotes->all();
        $this->data['pagebody'] = 'admin_list';
        $this->render();
    }
    
    // add a new quotation
    function add() {
        $quote = $this->quotes->create();
        $this->present($quote);
    }
    
    // Present a quotation for adding/editing,
    // works with quote_edit.php
    function present($quote) {
        $this->data['fid'] = makeTextField('ID#', 'id', $quote->id);
        $this->data['fwho'] = makeTextField('Author', 'who', $quote->who);
        $this->data['fmug'] = makeTextField('Picture', 'mug', $quote->mug);
        $this->data['fwhat'] = makeTextArea('The Quote', 'what', $quote->what);
        $this->data['pagebody'] = 'quote_edit';
        
        // creates a submit button for form processing
        $this->data['fsubmit'] = makeSubmitButton('Process Quote', "Click here to validate the quotation data", 'btn-success');
        
        $this->render();
    }
}