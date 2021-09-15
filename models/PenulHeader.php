<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penul_header".
 *
 * @property int $id
 * @property string|null $noagenda
 * @property int $jen_dok
 * @property int $jen_pelanggaran
 * @property string|null $analisa_prosedur_rha
 * @property string|null $analisa_prosedur_rha2 Latar Belakang
 * @property string|null $analisa_prosedur_rha3 Identifikasi Permasalahan 1
 * @property string|null $analisa_prosedur_rha4 Identifikasi Permasalahan 2
 * @property string|null $analisa_prosedur_rha5 Identifikasi Barang
 * @property string|null $analisa_prosedur_rha6 Penetapan Hs code 1
 * @property string|null $analisa_prosedur_rha7 Penetapan Hs code 2
 * @property int|null $kesimpulan_rha_jum_pt
 * @property float|null $kesimpulan_rha_nilaipotensi
 * @property string|null $laop
 * @property string|null $laop_tgl
 * @property string|null $kesimpulan_laop
 * @property int $penyaji_data1
 * @property int|null $penyaji_data2
 * @property int $analis1
 * @property int|null $analis2
 * @property int|null $analis3
 * @property int|null $pfpd pfpd pembuat kka
 * @property int|null $kasi kasi yg ikut dan berwenang
 * @property int|null $kabid kabid yg menyetujui
 * @property string|null $nd
 * @property string|null $nd_tgl
 * @property string|null $rha
 * @property string|null $rha_tgl
 * @property string|null $kkp
 * @property string|null $kkp_tgl
 * @property string|null $npp
 * @property string|null $npp_tgl
 * @property string|null $keputusan_npp
 * @property string|null $st
 * @property string|null $st_tgl
 * @property string|null $nhpu
 * @property string|null $nhpu_tgl
 * @property string|null $datagambar_filename
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property PenulDatatransaks[] $penulDatatransaks
 * @property JenDok $jenDok
 * @property PenulAnalisPenyaji $kab
 * @property JenPelanggaran $jenPelanggaran
 * @property PenulAnalisPenyaji $analis10
 * @property PenulAnalisPenyaji $analis20
 * @property PenulAnalisPenyaji $analis30
 * @property PenulAnalisPenyaji $penyajiData1
 * @property PenulAnalisPenyaji $penyajiData2
 * @property PenulAnalisPenyaji $pfpd0
 * @property PenulAnalisPenyaji $kasi0
 * @property PenulLinkTemaheader[] $penulLinkTemaheaders
 */
class PenulHeader extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penul_header';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jen_dok', 'jen_pelanggaran', 'penyaji_data1', 'analis1'], 'required'],
            [['jen_dok', 'jen_pelanggaran', 'kesimpulan_rha_jum_pt', 'penyaji_data1', 'penyaji_data2', 'analis1', 'analis2', 'analis3', 'pfpd', 'kasi', 'kabid', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['analisa_prosedur_rha', 'analisa_prosedur_rha2', 'analisa_prosedur_rha3', 'analisa_prosedur_rha4', 'analisa_prosedur_rha5', 'analisa_prosedur_rha6', 'analisa_prosedur_rha7'], 'string'],
            [['kesimpulan_rha_nilaipotensi'], 'number'],
            [['laop_tgl', 'nd_tgl', 'rha_tgl', 'kkp_tgl', 'npp_tgl', 'st_tgl', 'nhpu_tgl'], 'safe'],
            [['noagenda', 'keputusan_npp'], 'string', 'max' => 50],
            [['laop', 'nd', 'rha', 'kkp', 'npp', 'nhpu'], 'string', 'max' => 25],
            [['kesimpulan_laop'], 'string', 'max' => 255],
            [['st'], 'string', 'max' => 21],
            [['datagambar_filename'], 'string', 'max' => 100],
            [['jen_dok'], 'exist', 'skipOnError' => true, 'targetClass' => JenDok::className(), 'targetAttribute' => ['jen_dok' => 'id']],
            [['kabid'], 'exist', 'skipOnError' => true, 'targetClass' => PenulAnalisPenyaji::className(), 'targetAttribute' => ['kabid' => 'id']],
            [['jen_pelanggaran'], 'exist', 'skipOnError' => true, 'targetClass' => JenPelanggaran::className(), 'targetAttribute' => ['jen_pelanggaran' => 'id']],
            [['analis1'], 'exist', 'skipOnError' => true, 'targetClass' => PenulAnalisPenyaji::className(), 'targetAttribute' => ['analis1' => 'id']],
            [['analis2'], 'exist', 'skipOnError' => true, 'targetClass' => PenulAnalisPenyaji::className(), 'targetAttribute' => ['analis2' => 'id']],
            [['analis3'], 'exist', 'skipOnError' => true, 'targetClass' => PenulAnalisPenyaji::className(), 'targetAttribute' => ['analis3' => 'id']],
            [['penyaji_data1'], 'exist', 'skipOnError' => true, 'targetClass' => PenulAnalisPenyaji::className(), 'targetAttribute' => ['penyaji_data1' => 'id']],
            [['penyaji_data2'], 'exist', 'skipOnError' => true, 'targetClass' => PenulAnalisPenyaji::className(), 'targetAttribute' => ['penyaji_data2' => 'id']],
            [['pfpd'], 'exist', 'skipOnError' => true, 'targetClass' => PenulAnalisPenyaji::className(), 'targetAttribute' => ['pfpd' => 'id']],
            [['kasi'], 'exist', 'skipOnError' => true, 'targetClass' => PenulAnalisPenyaji::className(), 'targetAttribute' => ['kasi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'noagenda' => 'Noagenda',
            'jen_dok' => 'Jen Dok',
            'jen_pelanggaran' => 'Jen Pelanggaran',
            'analisa_prosedur_rha' => 'Analisa Prosedur Rha',
            'analisa_prosedur_rha2' => 'Analisa Prosedur Rha2',
            'analisa_prosedur_rha3' => 'Analisa Prosedur Rha3',
            'analisa_prosedur_rha4' => 'Analisa Prosedur Rha4',
            'analisa_prosedur_rha5' => 'Analisa Prosedur Rha5',
            'analisa_prosedur_rha6' => 'Analisa Prosedur Rha6',
            'analisa_prosedur_rha7' => 'Analisa Prosedur Rha7',
            'kesimpulan_rha_jum_pt' => 'Kesimpulan Rha Jum Pt',
            'kesimpulan_rha_nilaipotensi' => 'Kesimpulan Rha Nilaipotensi',
            'laop' => 'Laop',
            'laop_tgl' => 'Laop Tgl',
            'kesimpulan_laop' => 'Kesimpulan Laop',
            'penyaji_data1' => 'Penyaji Data1',
            'penyaji_data2' => 'Penyaji Data2',
            'analis1' => 'Analis1',
            'analis2' => 'Analis2',
            'analis3' => 'Analis3',
            'pfpd' => 'Pfpd',
            'kasi' => 'Kasi',
            'kabid' => 'Kabid',
            'nd' => 'Nd',
            'nd_tgl' => 'Nd Tgl',
            'rha' => 'Rha',
            'rha_tgl' => 'Rha Tgl',
            'kkp' => 'Kkp',
            'kkp_tgl' => 'Kkp Tgl',
            'npp' => 'Npp',
            'npp_tgl' => 'Npp Tgl',
            'keputusan_npp' => 'Keputusan Npp',
            'st' => 'St',
            'st_tgl' => 'St Tgl',
            'nhpu' => 'Nhpu',
            'nhpu_tgl' => 'Nhpu Tgl',
            'datagambar_filename' => 'Datagambar Filename',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[PenulDatatransaks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenulDatatransaks()
    {
        return $this->hasMany(PenulDatatransaks::className(), ['link_header' => 'id']);
    }

     public function getPenuldt()
    {
        return $this->hasMany(PenulDatatransaks::className(), ['link_header' => 'id']);
    }

    /**
     * Gets query for [[JenDok]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenDok()
    {
        return $this->hasOne(JenDok::className(), ['id' => 'jen_dok']);
    }

    /**
     * Gets query for [[Kab]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKab()
    {
        return $this->hasOne(PenulAnalisPenyaji::className(), ['id' => 'kabid']);
    }

    /**
     * Gets query for [[JenPelanggaran]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenPelanggaran()
    {
        return $this->hasOne(JenPelanggaran::className(), ['id' => 'jen_pelanggaran']);
    }

    /**
     * Gets query for [[Analis10]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnalis10()
    {
        return $this->hasOne(PenulAnalisPenyaji::className(), ['id' => 'analis1']);
    }

    /**
     * Gets query for [[Analis20]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnalis20()
    {
        return $this->hasOne(PenulAnalisPenyaji::className(), ['id' => 'analis2']);
    }

    /**
     * Gets query for [[Analis30]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnalis30()
    {
        return $this->hasOne(PenulAnalisPenyaji::className(), ['id' => 'analis3']);
    }

    /**
     * Gets query for [[PenyajiData1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenyajiData1()
    {
        return $this->hasOne(PenulAnalisPenyaji::className(), ['id' => 'penyaji_data1']);
    }

    /**
     * Gets query for [[PenyajiData2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenyajiData2()
    {
        return $this->hasOne(PenulAnalisPenyaji::className(), ['id' => 'penyaji_data2']);
    }

    /**
     * Gets query for [[Pfpd0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPfpd0()
    {
        return $this->hasOne(PenulAnalisPenyaji::className(), ['id' => 'pfpd']);
    }

    /**
     * Gets query for [[Kasi0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKasi0()
    {
        return $this->hasOne(PenulAnalisPenyaji::className(), ['id' => 'kasi']);
    }

    /**
     * Gets query for [[PenulLinkTemaheaders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenulLinkTemaheaders()
    {
        return $this->hasMany(PenulLinkTemaheader::className(), ['link_header' => 'id']);
    }

    //  public function fields()
    // {
    //     $fields = parent::fields();

    //    $fields[] = 'penuldatatransaks';


    //    return $fields;
    // }


    public function fields()
    {

        return [
            'id',
            'noagenda',
            'jen_dok',
            'jen_pelanggaran',
            'nd',

            
            'penuldt' => function ($model) {
             return $model->jen_pelanggaran;
                }, //ok
           // 'penuldatatransaks',
         
            
           //  'profile' => function ($model) {
           //     return $model->profile;
           // },

          //  'comment' 
     ];
 }

//  public function extraFields() {
//     return ['penuldt'];
// }

public function getProfile()
{
    return $this->hasOne(\app\models\Profile::className(), ['user_id' => 'id']);
}

public function getComment()
{
    return $this->hasMAny(\app\models\Comment::className(), ['user_id' => 'id']);
}



}
