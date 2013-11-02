<?php

namespace Monolog\Handler;

/**
* Forwards records to multiple specific handlers
*
* @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
*/
class SpecificHandler extends AbstractHandler
{
	/**
	 * @var  HandlerInterface  Handler or Processor
	 */
	protected $handler;

	/**
	 * @param mixed   $interface Handler or Processor
	 * @param boolean $bubble
	 */
	public function __construct(HandlerInterface $handler, $bubble = true)
	{
		$this->handler = $handler;
		$this->bubble = $bubble;
	}

    /**
     * {@inheritdoc}
     */
    public function isHandling(array $record)
    {
    	return $this->handler->isHandling($record);
    }

    /**
     * {@inheritdoc}
     */
    public function handle(array $record)
    {
    	$processors = empty($record['processors']) ? false : (is_array($record['processors']) ? $record['processors'] : array($record['processors']));
    	unset($record['processors']);

        $handler = empty($record['handler']) ? false : $record['handler'];
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

		$name = explode('\\', get_class($this->handler));
		$name = end($name);
		if ($name == $handler) {
			$this->handler->handle($record);
		}

        return false === $this->bubble;
    }

    /**
     * {@inheritdoc}
     */
    public function handleBatch(array $records)
    {
        $this->handler->handleBatch($records);
    }
}
