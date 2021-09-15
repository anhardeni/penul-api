<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PenulDatatransaks;
/**
 * This is the ActiveQuery class for [[PenulDatatransaks]].
 *
 * @see PenulDatatransaks
 */
class PenulDatatransaksSearch extends PenulDatatransaks
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

     public function rules()
    {
        return [
            [['link_header', 'seri_brg', 'kdskepfas', 'pfpd1', 'pfpd2', 'kasipab1', 'status_akhir_banding', 'created_by', 'updated_by'], 'integer'],
            [['flag_pusat', 'analisa'], 'string'],
            [['tglpib', 'npp_tgl', 'st_tgl', 'nhpu_tgl', 'spktnp_tgl', 'spktnp_jthtempo', 'sspcp_tgl', 'created_at', 'updated_at'], 'safe'],
            [['trf_bm', 'bm_nilai_awal', 'trf_bm_t', 'bm_t_nilai_akhir', 'bmbbs_nilai_akhir', 'bmad_nilai_akhir', 'bmdp_nilai_akhir', 'kurs', 'ppn_nilai_awal', 'ppn_t_nilai_akhir', 'ppnbbs_nilai_akhir', 'ppntdp_nilai_akhir', 'pph_nilai_awal', 'pph_t_nilai_akhir', 'pphbbs_nilai_akhir', 'pphdp_nilai_akhir', 'ppnbm_t_nilai_akhir', 'nilaipabean_awal', 'nilaipabean_akhir', 'denda', 'total_tagihan', 'bmi_nilai_akhir', 'bmp_nilai_akhir', 'bk_nilai_akhir', 'trf_ppn_t', 'trf_pph_t', 'trf_ppn', 'trf_pph', 'trf_ppnbm', 'trf_ppnbm_t', 'trf_bmad', 'trf_bmad_t', 'trf_bk_t', 'trf_bk', 'bk_nilai_awal'], 'number'],
            [['flag_pusat_ket'], 'string', 'max' => 20],
            [['kode_kantor'], 'string', 'max' => 6],
            [['pib'], 'string', 'max' => 12],
            [['npwp_imp'], 'string', 'max' => 30],
            [['imp', 'ntb', 'ntpn'], 'string', 'max' => 50],
            [['uraian_brg'], 'string', 'max' => 254],
            [['hs', 'hs_t'], 'string', 'max' => 15],
            [['ket'], 'string', 'max' => 255],
            [['npp_no', 'st_no', 'nhpu_no', 'spktnp_no', 'sspcp_no'], 'string', 'max' => 25],
            [['link_header'], 'exist', 'skipOnError' => true, 'targetClass' => PenulHeader::className(), 'targetAttribute' => ['link_header' => 'id']],
            [['kasipab1'], 'exist', 'skipOnError' => true, 'targetClass' => PenulAnalisPenyaji::className(), 'targetAttribute' => ['kasipab1' => 'id']],
            [['pfpd1'], 'exist', 'skipOnError' => true, 'targetClass' => PenulAnalisPenyaji::className(), 'targetAttribute' => ['pfpd1' => 'id']],
            [['pfpd2'], 'exist', 'skipOnError' => true, 'targetClass' => PenulAnalisPenyaji::className(), 'targetAttribute' => ['pfpd2' => 'id']],
        ];
    }
   

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
        $query = PenulDatatransaks::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'link_header' => $this->link_header,
            'tglpib' => $this->tglpib,
            'seri_brg' => $this->seri_brg,
            'kdskepfas' => $this->kdskepfas,
            'trf_bm' => $this->trf_bm,
            'bm_nilai_awal' => $this->bm_nilai_awal,
            'trf_bm_t' => $this->trf_bm_t,
            'bm_t_nilai_akhir' => $this->bm_t_nilai_akhir,
            'bmbbs_nilai_akhir' => $this->bmbbs_nilai_akhir,
            'bmad_nilai_akhir' => $this->bmad_nilai_akhir,
            'bmdp_nilai_akhir' => $this->bmdp_nilai_akhir,
            'kurs' => $this->kurs,
            'ppn_nilai_awal' => $this->ppn_nilai_awal,
            'ppn_t_nilai_akhir' => $this->ppn_t_nilai_akhir,
            'ppnbbs_nilai_akhir' => $this->ppnbbs_nilai_akhir,
            'ppntdp_nilai_akhir' => $this->ppntdp_nilai_akhir,
            'pph_nilai_awal' => $this->pph_nilai_awal,
            'pph_t_nilai_akhir' => $this->pph_t_nilai_akhir,
            'pphbbs_nilai_akhir' => $this->pphbbs_nilai_akhir,
            'pphdp_nilai_akhir' => $this->pphdp_nilai_akhir,
            'ppnbm_t_nilai_akhir' => $this->ppnbm_t_nilai_akhir,
            'nilaipabean_awal' => $this->nilaipabean_awal,
            'nilaipabean_akhir' => $this->nilaipabean_akhir,
            'denda' => $this->denda,
            'total_tagihan' => $this->total_tagihan,
            'bmi_nilai_akhir' => $this->bmi_nilai_akhir,
            'bmp_nilai_akhir' => $this->bmp_nilai_akhir,
            'bk_nilai_akhir' => $this->bk_nilai_akhir,
            'npp_tgl' => $this->npp_tgl,
            'st_tgl' => $this->st_tgl,
            'nhpu_tgl' => $this->nhpu_tgl,
            'pfpd1' => $this->pfpd1,
            'pfpd2' => $this->pfpd2,
            'kasipab1' => $this->kasipab1,
            'spktnp_tgl' => $this->spktnp_tgl,
            'spktnp_jthtempo' => $this->spktnp_jthtempo,
            'sspcp_tgl' => $this->sspcp_tgl,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'flag_pusat', $this->flag_pusat])
            ->andFilterWhere(['like', 'flag_pusat_ket', $this->flag_pusat_ket])
            ->andFilterWhere(['like', 'kode_kantor', $this->kode_kantor])
            ->andFilterWhere(['like', 'pib', $this->pib])
            ->andFilterWhere(['like', 'npwp_imp', $this->npwp_imp])
            ->andFilterWhere(['like', 'imp', $this->imp])
            ->andFilterWhere(['like', 'uraian_brg', $this->uraian_brg])
            ->andFilterWhere(['like', 'hs', $this->hs])
            ->andFilterWhere(['like', 'hs_t', $this->hs_t])
            ->andFilterWhere(['like', 'analisa', $this->analisa])
            ->andFilterWhere(['like', 'ket', $this->ket])
            ->andFilterWhere(['like', 'npp_no', $this->npp_no])
            ->andFilterWhere(['like', 'st_no', $this->st_no])
            ->andFilterWhere(['like', 'nhpu_no', $this->nhpu_no])
            ->andFilterWhere(['like', 'spktnp_no', $this->spktnp_no])
            ->andFilterWhere(['like', 'sspcp_no', $this->sspcp_no])
            ->andFilterWhere(['like', 'ntb', $this->ntb])
            ->andFilterWhere(['like', 'ntpn', $this->ntpn])
            ->andFilterWhere(['like', 'status_akhir_banding', $this->status_akhir_banding]);

        return $dataProvider;
    }
}
