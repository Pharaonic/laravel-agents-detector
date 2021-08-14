<?php

use Pharaonic\Laravel\Agents\Classes\AgentDetector;

/**
 * Getting Agent Object
 *
 * @return Agent
 */
function agent()
{
    return app()->has('Agent') ? app('Agent') : app()->instance('Agent', new AgentDetector);
}
