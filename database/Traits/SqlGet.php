<?php
declare(strict_types=1);
namespace Solluzi\Database\Traits;


/**
 * SqlGet Trait
 *  Gets oly one result on table select
 */
trait SqlGet
{
    use DbConnection;
    /**
     * get method
     *  Executes the sql instruction
     *
     * @return void
     */
    public function get()
    {
        /*
        |----------------------------------------------------------------------------------------------
        | query
        |----------------------------------------------------------------------------------------------
        |
        | gets the query objects to a variabes
        |
        */
        $query = $this->query;

        /*
        |----------------------------------------------------------------------------------------------
        | base
        |----------------------------------------------------------------------------------------------
        |
        | Gets the base query instruction into sql variable
        |
        */
        $sql   = $query->base;
        
        /*
        |----------------------------------------------------------------------------------------------
        | join
        |----------------------------------------------------------------------------------------------
        |
        | make inner join clause into sql
        |
        */
        if(!empty($query->join)){
            $sql .= implode(' ', $query->join);
        }

        /*
        |----------------------------------------------------------------------------------------------
        | leftJoin
        |----------------------------------------------------------------------------------------------
        |
        | adds left join clause into sql query
        |
        */
        if(!empty($query->leftJoin)){
            $sql .= implode(' ', $query->leftJoin);
        }

        /*
        |----------------------------------------------------------------------------------------------
        | rightJoin
        |----------------------------------------------------------------------------------------------
        |
        |adds right join to a sql clause
        |
        */
        if(!empty($query->rightJoin)){
            $sql .= implode(' ', $query->rightJoin);
        }

        /*
        |----------------------------------------------------------------------------------------------
        | Union
        |----------------------------------------------------------------------------------------------
        |
        | adds union to a sql clause
        |
        */
        if(!empty($query->union)){
            $sql .= $query->union;
        }

        /*
        |----------------------------------------------------------------------------------------------
        | unionAll
        |----------------------------------------------------------------------------------------------
        |
        | adds union all to a sql clause
        |
        */
        if(!empty($query->unionAll)){
            $sql .= $query->unionAll;
        }

        /*
        |----------------------------------------------------------------------------------------------
        | where
        |----------------------------------------------------------------------------------------------
        |
        | adds where if is needed some where filter
        |
        */
        if(!empty($query->where)){
            $sql .= " WHERE " . implode(' AND ', $query->where);
        }

        /*
        |----------------------------------------------------------------------------------------------
        | orWhere
        |----------------------------------------------------------------------------------------------
        |
        | adds "or where" filter if is needed some "or where" filter
        |
        */
        if(!empty($query->orWhere)){
            $sql .= implode(' OR ', $query->orWhere);
        }

        /*
        |----------------------------------------------------------------------------------------------
        | having
        |----------------------------------------------------------------------------------------------
        |
        | adds having filter if is needed
        |
        */
        if(!empty($query->having)){
            $sql .= $query->having;
        }

        /*
        |----------------------------------------------------------------------------------------------
        | between
        |----------------------------------------------------------------------------------------------
        |
        | adds between filter if is needed
        |
        */
        if(!empty($query->between)){
            $sql .= $query->between;
        }

        /*
        |----------------------------------------------------------------------------------------------
        | orderBy
        |----------------------------------------------------------------------------------------------
        |
        | adds order by if is needed
        |
        */
        if(!empty($query->orderBy)){
            $sql .= $query->orderBy;
        }

        /*
        |----------------------------------------------------------------------------------------------
        | groupBy
        |----------------------------------------------------------------------------------------------
        |
        | adds group by if is needed 
        |
        */
        if(!empty($query->groupBy)){
            $sql .= 'GROUP BY ' . implode(',',$query->groupBy);
        }

        /*
        |----------------------------------------------------------------------------------------------
        | limit
        |----------------------------------------------------------------------------------------------
        |
        | adds limit if is needed
        |
        */
        if(isset($query->limit)){
            $sql .= $query->limit;
        }
        
        /*
        |----------------------------------------------------------------------------------------------
        | connection method
        |----------------------------------------------------------------------------------------------
        |
        | open connection to a given SGBD
        |
        */
        $this->connect();
        
        /*
        |----------------------------------------------------------------------------------------------
        | conn
        |----------------------------------------------------------------------------------------------
        |
        | verifies if access is granted
        |
        */
        if($this->conn)
        {
            /*
            |------------------------------------------------------------------------------------------
            | Try to execute query
            |------------------------------------------------------------------------------------------
            |
            | Verifies if has between clause in sql request
            |
            */
            try {
                $sql .= ";";
                /*
                |-------------------------------------------------------------------------------------
                | beginTransaction
                |-------------------------------------------------------------------------------------
                |
                | As the name sugests, it begins a database transaction
                |
                */
                $this->beginTransaction();
                /*
                |-------------------------------------------------------------------------------------
                | prepare && execute
                |-------------------------------------------------------------------------------------
                |
                | Executes a sql transaction in database
                |
                */
                $instruction = $this->conn->prepare($sql);
                $instruction->execute($this->values);
                /*
                |-------------------------------------------------------------------------------------
                | result
                |-------------------------------------------------------------------------------------
                |
                | gets the result grabbed from database
                |
                */
                $result      = $instruction->fetchObject();

                /*
                |--------------------------------------------------------------------------
                |                                  commit
                |--------------------------------------------------------------------------
                |
                | confirms all sql selects
                |
                */
                $this->commit();

                /*
                |-------------------------------------------------------------------------------------
                | dbClose
                |-------------------------------------------------------------------------------------
                |
                | closes database connection
                |
                */
                $this->close();
                
                /*
                |-------------------------------------------------------------------------------------
                | return
                |-------------------------------------------------------------------------------------
                |
                | returns data to a frontend
                |
                */
                return (is_object($result)) ? $result : null;
            } catch (\Exception $e) {
                /*
                |-------------------------------------------------------------------------------------
                | roolback
                |-------------------------------------------------------------------------------------
                |
                | if ocurs any error, all request are undone
                |
                */
                $this->rollback();
                /*
                |-------------------------------------------------------------------------------------
                | Exception
                |-------------------------------------------------------------------------------------
                |
                | throws sql error
                |
                */
                throw new \Exception($e->getMessage());
            }
            
        }else{
            /*
            |----------------------------------------------------------------------------------------
            | Exception
            |----------------------------------------------------------------------------------------
            |
            | if connection not granted, returns this message
            |
            */
            throw new \Exception("No active connection!!");
        }
    }
}
