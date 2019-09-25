<?php
include_once ROOT.'/components/Db.php';
	class News{
		//returns single news item with specified id
		public static function getNewsItemById($id){
			//request to db
			$id = intval($id);
			if($id){
				
				$db = Db::getConnection();

				$result = $db->query('SELECT * FROM news WHERE id=' . $id);
				$result->setFetchMode(PDO::FETCH_ASSOC);
				$newsItem = $result->fetch();

				return $newsItem;
			}
		}

		//returns an array of news item by author
		public static function getNewsItemByAuthor($author_name){
			//request to db
			$author_name = trim($author_name);
			if($author_name){
				$db = Db::getConnection();

				$newsAuthor = array();

				$result = $db->query('SELECT id, title, author_name, newsDate, short_content' 
					. ' FROM news'
					. ' WHERE author_name= "' . $author_name . '"'  
					. ' ORDER BY newsDate DESC'
					);

				$i = 0;
				while($row = $result->fetch()){
					$newsAuthor[$i]['id'] = $row['id'];
					$newsAuthor[$i]['title'] = $row['title'];
					$newsAuthor[$i]['author_name'] = $row['author_name'];
					$newsAuthor[$i]['newsDate'] = $row['newsDate'];
					$newsAuthor[$i]['short_content'] = $row['short_content'];
					$i++;
				}
			}
			
			return $newsAuthor;
		}

		//returns an array of news item
		public static function getNewsList(){
			//request to db
			
			$db = Db::getConnection();

			$newsList = array();

			$result = $db->query('SELECT id, title, author_name, newsDate, short_content' 
				. ' FROM news'
				. ' ORDER BY newsDate DESC'
				. ' LIMIT 10');

			$i = 0;
			while($row = $result->fetch()){
				$newsList[$i]['id'] = $row['id'];
				$newsList[$i]['title'] = $row['title'];
				$newsList[$i]['author_name'] = $row['author_name'];
				$newsList[$i]['newsDate'] = $row['newsDate'];
				$newsList[$i]['short_content'] = $row['short_content'];
				$i++;
			}
			return $newsList;
		}
	}
?>