<?php 

include_once ROOT.'/models/News.php';

class NewsController{

	public function actionIndex()
	{
		
		$newsList = array();
		$newsList = News::getNewsList();

		require_once(ROOT . '/views/news/index.php');

		return true;
	}
	public function actionAuthor($author_name)
	{

		if($author_name){
			$newsAuthor = array();
			$newsAuthor = News::getNewsItemByAuthor($author_name);

			require_once(ROOT . '/views/news/author.php');
		}

		return true;
	}
	public function actionView($id)
	{
		if($id){
			$newsItem = News::getNewsItemById($id);
			require_once(ROOT . '/views/news/view.php');
			
		}

		return true;
	}
}

 ?>