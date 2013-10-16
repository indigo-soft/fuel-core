<?php

namespace Monolog\Formatter;


class ContextLineFormatter extends LineFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
        $output = parent::format($record);
    	$record = NormalizerFormatter::format($record);

        foreach ($record['context'] as $var => $val) {
            if (false !== strpos($output, '{'.$var.'}')) {
                $output = str_replace('{'.$var.'}', $this->convertToString($val), $output);
                unset($record['context'][$var]);
            }
        }

        return $output;
    }
}