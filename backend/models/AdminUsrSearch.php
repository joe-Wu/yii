<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AdminUsr;

/**
 * AdminUsrSearch represents the model behind the search form about `app\models\AdminUsr`.
 */
class AdminUsrSearch extends AdminUsr
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'admin_project_manager', 'admin_designer', 'admin_programmer', 'admin_system_engineer', 'admin_status'], 'integer'],
            [['admin_account', 'admin_password', 'admin_name', 'admin_nickname', 'admin_gender', 'admin_birthday', 'admin_company', 'admin_title', 'admin_tel', 'admin_home', 'admin_mobile', 'admin_email', 'admin_msn', 'admin_dutydate', 'admin_leftdate', 'admin_priv_code', 'admin_relationship', 'admin_remark', 'create_time', 'update_time', 'update_account'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AdminUsr::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'admin_id' => $this->admin_id,
            'admin_birthday' => $this->admin_birthday,
            'admin_dutydate' => $this->admin_dutydate,
            'admin_leftdate' => $this->admin_leftdate,
            'admin_project_manager' => $this->admin_project_manager,
            'admin_designer' => $this->admin_designer,
            'admin_programmer' => $this->admin_programmer,
            'admin_system_engineer' => $this->admin_system_engineer,
            'admin_status' => $this->admin_status,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'admin_account', $this->admin_account])
            ->andFilterWhere(['like', 'admin_password', $this->admin_password])
            ->andFilterWhere(['like', 'admin_name', $this->admin_name])
            ->andFilterWhere(['like', 'admin_nickname', $this->admin_nickname])
            ->andFilterWhere(['like', 'admin_gender', $this->admin_gender])
            ->andFilterWhere(['like', 'admin_company', $this->admin_company])
            ->andFilterWhere(['like', 'admin_title', $this->admin_title])
            ->andFilterWhere(['like', 'admin_tel', $this->admin_tel])
            ->andFilterWhere(['like', 'admin_home', $this->admin_home])
            ->andFilterWhere(['like', 'admin_mobile', $this->admin_mobile])
            ->andFilterWhere(['like', 'admin_email', $this->admin_email])
            ->andFilterWhere(['like', 'admin_msn', $this->admin_msn])
            ->andFilterWhere(['like', 'admin_priv_code', $this->admin_priv_code])
            ->andFilterWhere(['like', 'admin_relationship', $this->admin_relationship])
            ->andFilterWhere(['like', 'admin_remark', $this->admin_remark])
            ->andFilterWhere(['like', 'update_account', $this->update_account]);

        return $dataProvider;
    }
}
