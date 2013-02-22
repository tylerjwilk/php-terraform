<?php

    #doc
    #    classname:    Terraform
    #    scope:        PUBLIC
    # description:     Take a directory, get file contents, and terraform the contents
    #
    #/doc
    
    class Terraform
    {
        /*
         * Class variables
         */
        var $_dir     = false;
        var $_files   = false;
        var $_filters = false;
    
        /*
         * Constructor
         */
        function __construct ($dir, $filters)
        {
            $this->_dir = $dir;
            $this->_filters = $filters;
            $this->load();
        }
        
        /*
         * Call all loader functions
         */
        function load()
        {
            $this->loadFiles();
        }
                
        /*
         * Load files from dir
         */
        function loadFiles()
        {
            $files = scandir($this->_dir);
            foreach ($files as $file)
            {
                $filename = $this->_dir . $file;
                $this->_files[$file] = $this->getFileInfo($filename);
            }
        }
        
        /*
         * Get file information
         */
        function getFileInfo($filename)
        {
            $info = array
            (
                'is_dir' => is_dir($filename),
                'ext' => pathinfo($filename, PATHINFO_EXTENSION),
                'size' => filesize($filename),
                'contents' => file_get_contents($filename),
            );
            return $info;
        }
        
        /*
         * Go through each file and apply filters
         */
        function applyFilters()
        {
            foreach ($this->_files as &$file_data)
            {
                foreach ($this->_filters as $name => $func)
                {
                    $file_data['filtered'][$name] = $func($file_data);
                }
            }
        }

    }
    
