<?php

namespace App\Models;

use CodeIgniter\Model;

class Common extends Model
{

	/** Get count of events */
	public function getEvenstCount()
	{
        $sql = "
            SELECT count(e.id) as counts
            FROM events e
            WHERE e.status = 1
        ;";
        $res = $this->db->query($sql)->getResult();
        return $res;
	}
	
	/** Get list of all events */
	public function getAllEventList()
	{
        $sql = "
            SELECT e.id, e.etitle, ec.ectitle as category, ec.ecslug as catgslug, ec.image
            FROM events e
            INNER JOIN evcategories ec
            ON e.cid = ec.id
            WHERE e.status = 1
        ;";
        $res = $this->db->query($sql)->getResult();
        return $res;
	}
	
	/** Add new event */
	public function addEvent($data)
	{
	    $status = 1;
        $category = $data['category'];
        $etitle = htmlspecialchars($data['title']);
        $edescp = htmlspecialchars($data['descp']);
        if (!isset($data['status'])) {
            $status = 0;
        }
        $updsql = "INSERT INTO events (status, cid, etitle, edescp) VALUES ($status,$category,'$etitle','$edescp');";
        $res = $this->db->query($updsql);
        return $this->db->insertID();
	}
	
	/** Delete event */
	public function delete_event($id)
	{
	    $delsql = "DELETE FROM events WHERE id = $id;";
	    $res = $this->db->query($delsql);
	    $delsql = "DELETE FROM eventsmeta WHERE eid = $id;";
	    $res = $this->db->query($delsql);
	}
	
	/** Update event */
	public function updateEvent($data)
	{
        $event_id = $data['event_id'];
        $status = 1;
        $category = $data['category'];
        $etitle = htmlspecialchars($data['title']);
        $edescp = htmlspecialchars($data['descp']);
        
        if (!isset($data['status'])) {
            $status = 0;
        }
        
        $updsql = "UPDATE events SET cid = $category, etitle = '$etitle', edescp = '$edescp', status = $status WHERE id = $event_id;";
        $res = $this->db->query($updsql);
        return $res;
	}
	
	/** Delete old file entries from events meta */
	public function deleteEventOldFiles($eid,$ids)
	{
	    $delsql = "DELETE FROM eventsmeta WHERE eid = $eid AND id NOT IN ($ids);";
        $res = $this->db->query($delsql);
        return $res;
	}
	
	/** Get event details */
	public function getEvenDetail($slug)
	{
        $sql = "
            SELECT e.id, e.etitle, ec.ectitle as category, ec.ecslug as catgslug, ec.image
            FROM events e
            INNER JOIN evcategories ec
            ON e.cid = ec.id
            WHERE e.status = 1
            AND ec.ecslug = '$slug'
            LIMIT 1
        ;";
        $res = $this->db->query($sql)->getResult();
        return $res;
	}
	
	/**
	 * Insert new image
	 */
	public function addEventImage($data)
	{
	    $insql = "
	        INSERT INTO eventsmeta (eid,ekey,val,origname,meta) VALUES (
            ".$data['uid'].",'image','".$data['filename']."','".$data['actual_fname']."','".$data['type']."'
            );
	    ";
        $res = $this->db->query($insql);
        return $res;
	}

	/** Get specific event images */
	public function getEventImagesByID($id)
	{
        $sql = "
            SELECT e.id, e.val
            FROM eventsmeta e
            WHERE eid = {$id}
            AND
            ekey = 'image';
        ;";
        $res = $this->db->query($sql)->getResult();
        return $res;
	}

	/** Get specific event details by ID */
	public function getEventDetailsByID($id)
	{
        $sql = "
            SELECT e.id, e.status, e.cid, e.etitle, e.edescp, e.created_at
            FROM events e
            WHERE e.id = {$id}
        ;";
        $res = $this->db->query($sql)->getResult();
        return $res;
	}
	
	/** Get specific event details */
	public function getEventDetails($slug, $key)
	{
        $sql = "
            SELECT em.ekey, em.val
            FROM evcategories ec
            INNER JOIN events e
            ON ec.id = e.cid
            INNER JOIN eventsmeta em
            ON e.id = em.eid
            WHERE e.status = 1
            AND em.ekey = '$key'
            AND ec.ecslug = '$slug'
        ;";
        $res = $this->db->query($sql)->getResult();
        return $res;
	}
	
	/** Check if user exists */
	public function validateuser($email)
	{
	    $sql = "
	        SELECT
	        *
	        FROM users
	        WHERE
	        email = '$email'
	        AND
	        status = 1
	        LIMIT 1
	    ;";
	    $res = $this->db->query($sql)->getResult();
	    return $res;
	}

	/** get user permissions */
	public function getuserpermissions($id)
	{
	    $sql = "
        	SELECT
            pm.slug
            FROM perms p
            INNER JOIN permissions pm
            ON p.pid = pm.id
            WHERE pm.status = 1
            AND
            p.uid = $id
	    ;";
	    $res = $this->db->query($sql)->getResult();
	    return $res;
	}

	/** get category list */
	public function getAllCategories()
	{
	    $sql = "
            SELECT
            ec.id, ec.ectitle, ec.ecslug, ec.image
            FROM evcategories ec
	    ;";
	    $res = $this->db->query($sql)->getResult();
	    return $res;
	}
	
	/** Add new category */
	public function addCategory($data)
	{
	    $insql = "
	        INSERT INTO evcategories (ectitle, ecslug, image) VALUES (
	        '".$data['title']."', '".$data['slug']."','".$data['filename']."'
	        );
	    ";
        $res = $this->db->query($insql);
        return $res;
	}
	
	/** Delete event */
	public function delete_category($id)
	{
	    $delsql = "DELETE FROM evcategories WHERE id = $id;";
	    $res = $this->db->query($delsql);
	    $delsql = "DELETE FROM events WHERE cid = $id;";
	    $res = $this->db->query($delsql);
	}

}