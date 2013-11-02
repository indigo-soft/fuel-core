<?php

namespace Monolog\Handler;

/**
* Forwards records to multiple specific handlers
*
* @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
*/
class SpecificHandler extends GroupHandler
{
    public function handle(array $record)
    {
    	$processors = empty($record['processor']) ? false : (is_array($record['processor']) ? $record['processor'] : array($record['processor']));
    	unset($record['processor']);

        $handlers = empty($record['handler']) ? false : (is_array($record['handler']) ? $record['handler'] : array($record['handler']));
        unset($record['handler']);

        if ($this->processors) {
            foreach ($this->processors as $processor) {
            	if ($processors === false) {
                	$record = call_user_func($processor, $record);
            	} else {
            		$name = explode('\\', get_class($processor));
            		$name = end($name);
            		if (in_array($name, $processors)) {
            			$record = call_user_func($processor, $record);
            		}
            	}
            }
        }

        foreach ($this->handlers as $handler) {
        	if ($handlers === false) {
            	$handler->handle($record);
        	} else {
        		$name = explode('\\', get_class($handler));
        		$name = end($name);
        		if (in_array($name, $handlers)) {
        			$handler->handle($record);
        		}
        	}
        }

        return false === $this->bubble;
    }
}
