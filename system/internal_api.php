<?php

class CInternalApi
{
    public function get_last5_parts()
    {
        global $db;
        $ret = $db->pdo->query('select parts.name, model.name, brand.name, parts.id from parts inner join model on model.id = parts.parent_model inner join brand on brand.id = model.parent_brand order by parts.id desc limit 5');

        return $ret->fetchAll();
    }

    public function get_all_brands()
    {
        global $db;
        $ret = $db->pdo->query('select id, name from brand');

        return $ret->fetchAll();
    }

    public function get_all_models()
    {
        global $db;
        $ret = $db->pdo->query('select id, name, parent_brand from model');

        return $ret->fetchAll();
    }

    public function get_brand_details($id)
    {
        global $db;
        $sql = 'select id, name from brand where id = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$id]);
		$ret = $stmt->fetchAll();
        return $ret;
    }

    public function get_all_models_adminpanel()
    {
        global $db;
        $ret = $db->pdo->query('select model.id as modelid, model.name as modelname, brand.id as brandid, brand.name as brandname from model inner join brand on brand.id = model.parent_brand order by brand.name asc');

        return $ret->fetchAll();
    }

    public function get_model_details($id)
    {
        global $db;
        $sql = 'select id, name, parent_brand from model where id = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$id]);
		$ret = $stmt->fetchAll();
        return $ret;
    }

    public function get_all_parts_adminpanel()
    {
        global $db;
        $ret = $db->pdo->query('select parts.id, parent_model, parts.name, description, model.name as modelname, brand.name as brandname from parts inner join model on model.id = parent_model inner join brand on brand.id = parent_brand');

        return $ret->fetchAll();
    }

    public function get_part_data($id)
    {
        global $db;
        $sql = 'select id, name, parent_model, description from parts where id = ?';
		$stmt = $db->pdo->prepare($sql);
		$stmt->execute([$id]);
		$ret = $stmt->fetchAll();
        return $ret;
    }
}

$IAPI = new CInternalApi;
