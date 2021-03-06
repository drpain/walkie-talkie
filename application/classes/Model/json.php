<?php defined('SYSPATH') or die('No direct script access.');

class Model_json extends Model {

    // This controller will provide a success / failure response along with a message to be displayed should and error be encountered
    // My interpretation of a simple API
    public $output = array(
        "state"         => "error",
        "message"       => "No valid action provided",
        "data"          => array(),
        "timestamp"     => 0
    );

    // Set the optional data
    public function data($data)
    {
        // We expect an array. Set it as the data
        $this->output['data'] = $data;
    }

    // Return a failed response
    public function error($message="")
    {
        # Set a failed response
        $this->output["state"] = "error";
        $this->output["timestamp"] = time();

        // Ensure that we have a message
        if (!empty($message))
        {
            $this->output["message"] = $message;
        }

        // Set a generic error message
        else
        {
            $this->output["message"] = "Empty message";
        }

        # Render it out
        $this->render();
    }

    // Return a successful output
    public function success($message="")
    {
        // Set a failed output
        $this->output["state"] = "success";
        $this->output["timestamp"] = time();

        // Ensure that we have a message
        if (!empty($message))
        {
            $this->output["message"] = $message;
        }

        // Set a generic message
        else
        {
            $this->output["message"] = "Empty message";
        }

        // Render it out
        $this->render();
    }

    // Render the output
    public function render()
    {
        // Echo out the json_encoded detail
        echo json_encode($this->output);
    }
}