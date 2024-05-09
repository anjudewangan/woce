<?php
class Query_Functions extends sqlConnection
{


	//------------------Excute Query--------------------
	public function QueryExecuteList($sql_execute)
	{
		$rs_productlist = $this->query($sql_execute);
		return $rs_productlist->rows;
	}

	//------------------Excute Num Rows--------------------
	public function numRows($rowquery)
	{
		$sql_rows = $this->query($rowquery);
		return $sql_rows->num_rows;
	}


	//------------------Blog Listing--------------------
	public function BlogsListing($query)
	{
		if (isset($query) && $query != '') {
			$search = "AND (title like '%" . $query . "%' or description like '%" . $query . "%')";
		} else {
			$search = "";
		}

		$sql_blogs = "select id, blog_date, author,title, CONCAT(LEFT(description,500),'..') as blog_desp, blog_image, author from blog where 1 " . $search . " order by id desc";
		return $sql_blogs;
	}
	//------------------Blog Listing--------------------
	public function RecentBlogs($id)
	{
		if (isset($id) && $id != '') {
			$recntId = "AND id!=$id";
		} else {
			$recntId = "";
		}
		$sql_blog = $this->query("select id,title,blog_image from blog where 1 " . $recntId . " order by rand() limit 0,5");
		return $sql_blog->rows;
	}

	//------------------Blog Views--------------------
	public function BlogViews($blogId)
	{
		$sql_blog = $this->query("select * from blog where id='$blogId' limit 0,1");
		return $sql_blog->row;
	}

	//------------------Media Listing--------------------
	public function MediaListing()
	{
		$sql_media = $this->query("select release_date, title, media_url, CONCAT(LEFT(description,300),'..') as description, media_image,author from media where media_image!='' order by release_date desc");
		return $sql_media->rows;
	}

	//------------------Pree Release Latest Listing--------------------
	public function PressReleaseLates_Listing($limt)
	{
		$sql_media = $this->query("select * from press_release order by release_date desc limit 0,".$limt);
		return $sql_media->rows;
	}

	//------------------Invite Send--------------------
	public function ContactSubmit($data)
	{
		$this->query("Insert into contact set date='" . date('Y-m-d') . "', name='" . addslashes($data["name"]) . "', email='" . addslashes($data["email"]) . "', phone='" . addslashes($data["phone"]) . "', message='" . addslashes($data["message"]) . "', country='" . addslashes($data["country"]) . "', reason='" . addslashes($data["reason"]) . "'");
	}
}
