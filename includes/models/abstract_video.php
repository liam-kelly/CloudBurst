<?php
/**
 * Name: Media Metadata Abstraction Layer
 * Description: An abstraction layer between media metadata and the database
 * Date: 10/18/13
 * Time: 10:13 PM
 * Programmer: Liam Kelly
 */

//Includes
if(!(defined(ABSPATH))){
    require_once('../path.php');
}
require_once(ABSPATH.'/includes/fetch.php');
require_once(ABSPATH.'/includes/data.php');

//abstract_media class
class abstract_media {

    //Define variables

        //Database Fields

            //media table
            public $media_index             = '';
            public $media_type              = '';
            public $media_location          = '';
            public $media_description       = '';
            public $media_season            = '';
            public $media_episode           = '';
            public $media_title             = '';

            //types table
            public $types_index             = '';
            public $types_type              = '';
            public $types_name              = '';
            public $types_description       = '';

        //Control Variables
            public $item                    = '';
            public $dbc                     = '';

    //Define Functions

        //Rest Fields
        public function reset_fields(){

            /**
             * This function resets all field values to an empty state
             */

            //Reset fields
            $this->media_index              = null;
            $this->media_type               = null;
            $this->media_location           = null;
            $this->media_description        = null;
            $this->media_season             = null;
            $this->media_episode            = null;
            $this->types_index              = null;
            $this->types_type               = null;
            $this->types_name               = null;
            $this->types_description        = null;

            //return
            return true;

        }

        //Convert
        public function convert() {

            /**
             * This function converts metadata to a database friendly format
             */

            //Fetch the metadata
            $meta = fetch_meta($this->item);

            //Lookup
            $lookup = $this->lookup($meta['tv_show_name']);
            if(count($lookup) <= 1){

                //We exist do nothing

            }else{

                //Insert the new media into types

            }

            //Convert
            $this->media_index              = null;
            $this->media_type               = $lookup[0]['index'];
            $this->media_location           = $this->item;
            $this->media_description        = $meta['description'];
            $this->media_season             = $meta['tv_season'];
            $this->media_episode            = $meta['tv_episode'];

            //Push to database
            $this->send();

        }

        //Send
        public function send()  {

            /**
             * This function sends the converted data to the database
             */

            //Setup the database connection
            $this->dbc = new db;
            $this->dbc->connect();

            //Query the database
            echo $query = '';
            //$this->dbc->insert($query);

            //Close the database connection
            $this->dbc->close();

        }

        //Lookup
        public function lookup($name) {

            /**
             * This function looks up names and types from metadata in the database to determine how to list
             */

            //Setup the database connection
            $this->dbc = new db;
            $this->dbc->connect();

            //Determine if the name is in the database

                //Prep string for search
                $name = $this->dbc->sanitize($name);
                $name = strtolower($name);

                //Query the database
                $query = "SELECT * FROM `types` WHERE `name` LIKE '%".$name."%'";
                $array = $this->dbc->query($query);

            //Close the database connection
            $this->dbc->close();

            return $array;

        }


}