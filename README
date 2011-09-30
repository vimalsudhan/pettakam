
Pettakam, a simple PHP cache library
====================================

	This cache library is effective, if you don't have memcache or any cache server and you are running large DB queries which can be cached. This library makes use of filesytem to cache your variables, which will be faster compared to running queries in a relatively large Database.

	Like in a cache server, you can set expiration time for your cached variables, can cache any datatype(numeric,string,arrays,objects) except resource-type, check cached and clear any or all cached.

	As a step further for cache control, you can group your cached variables into 'groups' and you can clear a set(group) of cached ones. This is useful when there is a 'UPDATE' and a set of cached variables are affected & needs updation.


Note : This library needs a writable directory where cached variables are stored.


(c) Copyright 2011 Vimal Sudhan
License : Apache License 2.0, GNU GPL 3.0

Documentation : http://code.vimalsudhan.com/pettakam


USAGE:
------

$pettakam=new Pettakam(array('repo'=>'cache_dir'));		   /* initialize lib with cache to 'cache_dir' */
if(($employees=$pettakam->get("employees")===false)		   /* check whether data 'employees' exists in cache */
{
   $employees='<<EXECUTE QUERY>>';				   /* Cache is not available. 
								      do your database query 
								      or by any other means to create data */
   $pettakam->store("employees",$employees,"500","employee_data"); /* Store it in cache. 
								     Expiration time of 500 secs(optional) and group 
								     the cache to 'employee_data' group (optional) */
}
// got the employees either from cache or new create. proceed with the data variable...
// Cool!



Documentation
=============

Initing
-------

	$config=array('repo'=>'cache');
	$pettakam=new Pettakam($config);

	You need to set a directory using 'repo' option where cached variables are stored. In this case, 'cache' and the directory should have write permission.

	You can also set 'ext' which will be appended with '_'(underscore) to the created cached files, in order to identify cache files from others. Default is 'pkm'
Ex:	$config=array(
			'repo'=>'cache'
			'ext'=>'cac'
			);
	$pettakam=new Pettakam($config);


Storing a variable in cache:
----------------------------

Syntax : $pettakam->store($name,$value,$expires=600,$group="")
where
	$name		-	name for your variable. Unique identifier
	$val		-	value of the variable to be cached. Can be of any data type except resource-type.
	$expires	-	expiration time in secs for the cache. Default is 600 secs (10 mins)
	$group		-	(String) & (optional)Set to a group name to group your cached variables.
				This is useful when you need to clear a set of cached variables 
				that needs update because of change in database or any.

Example:	$pettakam->store("msg","Hello, I am cached",40,"usermsg")


Checking & getting cache:
-------------------------

Syntax : $pettakam->get($variable)
where
	$variable	-	name of your cached variable. unique identifier set while storing

Returns the value of cached variable, when available and not expired in cache. Or else returns FALSE.



Clearing Cache:
---------------

Clearing single cache:
----------------------

Syntax : $pettakam->clear($variable)
where
	$variable	-	name of your cached variable which is to be cleared


Clearing multiple cache:
-----------------------

Syntax : $pettakam->clear($variable)
where
	$variable	-	an array of cached variables which are to be cleared

Example:	$pettakam->clear(array('menu','employee_data'));


Clearing a group:
-----------------

Syntax	: $pettakam->clear_group($group)
where
	$group		-	Group name. This will clear the entire set(group) of cached variables of group '$group'.


Clearing entire cache:
----------------------

Syntax	: $pettakam->clear_all()
clears all variables in the cache system



Please send your comments, queries & questions to me@vimalsudhan.com, if any
http://code.vimalsudhan.com


[[END-OF-README]]
