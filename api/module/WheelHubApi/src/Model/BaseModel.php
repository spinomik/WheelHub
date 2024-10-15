<?php

namespace WheelHubApi\Model;

abstract class BaseModel
{
    protected static function mapKeysToSnakeCase(array $data): array
    {
        $mapped = [];
        foreach ($data as $key => $value) {
            $snakeKey = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $key));
            $mapped[$snakeKey] = $value;
        }
        return $mapped;
    }
}
