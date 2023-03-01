<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advance Task 1</title>
</head>

<!-- Linking the css page. -->
<link rel="stylesheet" href="index.css">
<body>
  <div class="container">
  <?php

    //Calling and using the php guzzle package.
    require_once "vendor/autoload.php";
    use GuzzleHttp\Client;

    /**
     * This class is created inorder to fetch data from an api and create a website from it.
     * @method $getdata
     * It fetches the api data
     * @method $storingValue.
     * It stores and prints the value.
     */
    class FetchData {

      /**
       * This method is used for calling an api, storing its json response, decoding the json response and  returning it.
       * Since we are using Gazzle, this function creates an object from the "Client" class of Gazzle, and stores the response of the api with its help.  
       * @param $url 
       * It is used for getting the url of api.
       * @return $data is for returning the decoded json data obtained . 
       */
      function getData(string $url): array {
        $client = new Client();
        $response = $client->get($url);
        $json = $response->getBody()->getContents();
        $data = json_decode($json, TRUE);
        return $data;
      }

      /**
       * This function is responsible for fetching the values , storing and printing it.
       * @param $main_response_data 
       * It is used to collect the json decoded response from where we shall obtain the data.
       */
      function storingValue($main_response_data): void {

        // Storing the value of the no of items present in the body of the response.
        $len = count($main_response_data['data']);

        // This link needs to be appended before the explore now link and the image urls.
        $prefix_link = "https://ir-dev-d9.innoraft-sites.com/";

        // Iterating for fetching the title, image, links, body $len times.
        for ($i = 0; $i < $len; $i++) {

          // Fetching titles and storing.
          $store_titles = $main_response_data['data'][$i]['attributes']['title'];

          // Fetching the values of a section's body.
          $list_items = $main_response_data['data'][$i]['attributes']['field_services'];

          // calling api for getting the image and storing it in $store_image variable.
          $image_get_api = $main_response_data['data'][$i]['relationships']['field_image']['links']['related']['href'];;
          $image_response_data = $this->getData($image_get_api);
          $store_image = $prefix_link .  $image_response_data['data']['attributes']['uri']['url'];

          // calling api for getting the explore link and storing it in $store_explore_link variable.
          $explore_link_get_api = $main_response_data['data'][$i]['links']['self']['href'];
          $explore_link_data = $this->getData($explore_link_get_api);
          $store_explore_link = $prefix_link . $explore_link_data['data']['attributes']['path']['alias'];

          // Setting a conditon to check if the body of a particular section is present or not. If not we omit the whole section.
          if ($list_items != NULL) { 
             ?>
            <div class="section">
              <div class="text-section col">
                <div class="title">
                  <!--Printing the titles of a section.  -->
                  <h2> <a href="<?php echo $store_explore_link;?>"><?php echo $store_titles ?></a></h2>
                </div>
                <div class="body">
                  <!-- Printing the body of a section. -->
                  <?php echo $list_items['value'];?>
                </div>
                <div class="button">
                  <!-- Printing the link of a section. -->
                  <a href="<?php echo $store_explore_link;?>">EXPLORE MORE</a>
                </div>
              </div>
              <div class="image-section col">
                <!-- Printing the image of a section. -->
                <img src="<?php echo $store_image;?>" alt="image">
              </div>
            </div> 
            <?php
          }
        }
      }

    }

    //Storing the main api's link and passing it.
    $url_main = 'https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services';

    //Creating an object of the class FetchData and calling the methods.
    $api = new FetchData;
    $main_response_data = $api->getData($url_main);
    $api->storingValue($main_response_data);
  ?>
</body>

</html>
