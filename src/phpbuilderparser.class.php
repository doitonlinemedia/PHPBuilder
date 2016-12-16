<?php
class PHPBuilderParser
{ 
    public static function ArrayToPHP($key, $value, $intend)
    {
        $return = str_repeat(T, $intend);
        if(is_int($key))
        {
            $return .= $key;
        }
        elseif(is_string($key))
        {
            $return .= "'".$key."'";
        }
        $return .= ' => ';
        $return .= self::VariableToPHP($value, $intend);
        $return .= ','.N;
        
        return $return;
    }
    
    public static function VariableToPHP($value, $intend = 1)
    {
        $return = '';
        if(is_int($value) || is_float($value))
        {
            $return .= $value;
        }
        elseif(is_string($value))
        {
            $return .= "'".$value."'";
        }
        elseif(is_array($value))
        {
            $return .= "array(".N;
            $intend++;
            foreach($value as $key => $value2)
            {
                $return .= self::ArrayToPHP($key, $value2, $intend);
            }         
            $intend--;   
            $return .= str_repeat(T, $intend).")";
        }
        elseif(is_bool($value))
        {
            if($value)
            {
                $return .= "true";
            }
            else
            {
                $return .= "false";
            }
        }
        elseif(is_null($value))
        {
            $return .= "null";
        }
        else
        {
            // doet het niet
        }
        
        return $return;
    } 
    
    
    public static function CArrayToPHP($key, $value, $intend)
    {
        $return = str_repeat(T, $intend);
        if(is_string($key))
        {
            $return .= "'".str_replace("'","\\'",$key)."'";
            $return .= ' => ';
        }
        $return .= self::CVariableToPHP($value, $intend);
        $return .= ','.N;
        
        return $return;
    }
    
    public static function CVariableToPHP($value, $intend = 1)
    {
        $return = '';
        if(is_int($value) || is_float($value))
        {
            $return .= $value;
        }
        elseif(is_string($value))
        {
            $return .= "'".str_replace("'","\\'",$value)."'";
        }
        elseif(is_array($value))
        {
            $onlyString = true;
            foreach($value as $key => $value2)
            {
                if(!is_int($key) || !is_string($value2))
                {
                    $onlyString = false;
                    break;
                }
            }
            
            if($onlyString)
            {
                $return .= "array(";
                
                foreach($value as $key => $value2)
                {
                    $value[$key] = "'".$value2."'";
                }         
                $return .= implode(",",$value);
                $return .= ")";
                
            }
            else
            {
                $return .= "array(".N;
                $intend++;
                foreach($value as $key => $value2)
                {
                    $return .= self::CArrayToPHP($key, $value2, $intend);
                }         
                $intend--;   
                $return .= str_repeat(T, $intend).")";
            }
        }
        elseif(is_bool($value))
        {
            if($value)
            {
                $return .= "true";
            }
            else
            {
                $return .= "false";
            }
        }
        elseif(is_null($value))
        {
            $return .= "null";
        }
        else
        {
            // doet het niet
        }
        
        return $return;
    } 
}