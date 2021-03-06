<?php
namespace qtests\db\transaction;
use qing\facades\Model;
/**
 * 事务
 * 使用普通sql语句和代替pdo驱动函数
 * 
 * @author xiaowang <736523132@qq.com>
 * @copyright Copyright (c) 2013 http://qingmvc.com
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
class Trans02Test extends Base{
	/**
	 */
	public function testRollback(){
		$table=QTESTS_TABLE;
		
		//#开启事务
		$res=Model::execute('START TRANSACTION');
		//dump($res);
		$this->assertTrue($res===true);
		
		//insert插入数据
		$res=Model::table($table)->insert(['title'=>'xiaowang1','addtime'=>time()]);
		$this->assertTrue(is_int($res) && $res==1);//1
		//dump($res);
		
		//#回滚事务
		$res=Model::execute('ROLLBACK');
		//dump($res);
		$this->assertTrue($res===true);
		
		//事务回滚，表中没有数据
		$res=Model::table($table)->where(['id'=>1])->find();
		//dump($res);
		$this->assertTrue(is_array($res) && !$res);
	}
	/**
	 */
	public function testCommit(){
		$table=QTESTS_TABLE;
		
		//#开启事务
		$res=Model::execute('START TRANSACTION');
		//dump($res);
		$this->assertTrue($res===true);
		
		//insert插入数据
		$res=Model::table($table)->insert(['title'=>'xiaowang1','addtime'=>time()]);
		$this->assertTrue(is_int($res) && $res==1);//1
		//dump($res);
		
		//#提交事务
		$res=Model::execute('COMMIT');
		//dump($res);
		$this->assertTrue($res===true);
		
		//事务提交，修改保存到了物理空间
		$res=Model::table($table)->where(['id'=>1])->find();
		//dump($res);
		$this->assertTrue(is_array($res) && $res['title']=='xiaowang1' && $res['id']==1);
	}
}
?>