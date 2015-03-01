<?php

class Admin extends Application {

    function __construct() {
        parent::__construct();        
    }
    
    // displays the quotations in a minimally formatted table by ID, author,
    // mugshot file name, and actual quotation
    function index() {
        $this->data['title'] = 'Quotations Maintenance';
        $this->data['quotes'] = $this->quotes->all();
        $this->data['pagebody'] = 'admin_list';
        $this->render();
    }
    
    function add() {
        
    }
}