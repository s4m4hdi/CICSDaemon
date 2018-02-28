<?php
// tick use required as of PHP 4.3.0
declare(ticks = 1);

function getSemaphore($SEMKEY)
{
    // Get semaphore
    $sem_id = sem_get($SEMKEY, 1);
    if ($sem_id === false)
    {
        echo "Fail to get semaphore";
        return(0);
    }
    else
	{	
        echo "Got semaphore $sem_id.\n";
	return $sem_id;
	}
}

function acquireSemaphore($sem_id)
{
    // Accuire semaphore
    if (! sem_acquire($sem_id))
    {
        echo "Fail to aquire semaphore $sem_id.\n";
        sem_remove($sem_id);
        return(false);
    }
    else
	{
        echo "Success aquire semaphore $sem_id.\n";
 	return (true);
	}	
}

function attachSharedMem($sem_id,$SHMKEY,$MEMSIZE)
{
    $shm_id =   shm_attach($SHMKEY, $MEMSIZE);
    if ($shm_id === false)
    {
        echo "Fail to attach shared memory.\n";
        sem_remove($sem_id);
        return(0);
    }
    else {
        echo "Success to attach shared memory : $shm_id.\n";
	return ($shm_id);
	}
}

function writeSharedMem($sem_id,$shm_id,$var1)
{
    // Write variable 1
    if (!shm_put_var($shm_id, 1, "Variable 1"))
    {
        echo "Fail to put var 1 on shared memory $shm_id.\n";
        sem_remove($sem_id);
        shm_remove ($shm_id);
        return(false);
    }
    else
	{
        echo "Write var1 to shared memory.\n";
	return(true);
	}
}

function readSharedMem($sem_id,$shm_id,$var)
{
    // Read variable 1
    $var2   =   shm_get_var ($shm_id, 2);
    if ($var1 === false)
    {
        echo "Fail to retrive Var 2 from Shared memory $shm_id, return value=$var2.\n";
    }
    else
        echo "Read var2=$var2.\n";

    // Release semaphore
    if (!sem_release($sem_id))
        echo "Fail to release $sem_id semaphore.\n";
    else
        echo "Semaphore $sem_id released.\n";
}

function removeSharedMemory($sem_id,$shm_id)
{
    // remove shared memory segmant from SysV
    if (shm_remove ($shm_id))
        echo "Shared memory successfully removed from SysV.\n";
    else
        echo "Fail to remove $shm_id shared memory from SysV.\n";

    // Remove semaphore
    if (sem_remove($sem_id))
        echo "semaphore removed successfully from SysV.\n";
    else
        echo "Fail to remove $sem_id semaphore from SysV.\n";
}

?>
