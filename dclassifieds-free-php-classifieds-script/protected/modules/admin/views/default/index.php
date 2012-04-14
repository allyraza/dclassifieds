<?
/**
 * 
 * Draw chart by day
 * 
 */
$flashChart = Yii::createComponent('application.extensions.ofc2.EOFC2');
 
$flashChart->begin('by_day');
$flashChart->setTitle(Yii::t('admin_v2', 'Published Ads By Date'),'{color:#000; font-size:15px; padding-bottom:20px;}');
 
$flashChart->setData($by_date);
$flashChart->setNumbersPath('{n}.Day.count');
$flashChart->setLabelsPath('default.{n}.Day.date');
 
$flashChart->setLegend('x', Yii::t('admin_v2', 'Date'), '{color:#000; font-size:12px;}');
$flashChart->setLegend('y', Yii::t('admin_v2', 'Ads Count'), '{color:#000; font-size:12px;}');
 
$flashChart->axis('x',array('3d' => 5));
$flashChart->axis('y', array('range' => array(0, $by_date_settings['by_date_max'], $by_date_settings['by_date_step'])));

$flashChart->renderData('bar_3d', array('colour' => '#1f44ff'));

$flashChart->render(900,300);

echo '<br /><br /><br /><br />';

/**
 * 
 * Draw chart by month
 * 
 */
$flashChart = Yii::createComponent('application.extensions.ofc2.EOFC2');
 
$flashChart->begin('by_month');
$flashChart->setTitle(Yii::t('admin_v2', 'Published Ads By Month'),'{color:#000; font-size:15px; padding-bottom:20px;}');
 
$flashChart->setData($by_month);
$flashChart->setNumbersPath('{n}.Month.count');
$flashChart->setLabelsPath('default.{n}.Month.date');
 
$flashChart->setLegend('x', Yii::t('admin_v2', 'Date'), '{color:#000; font-size:12px;}');
$flashChart->setLegend('y', Yii::t('admin_v2', 'Ads Count'), '{color:#000; font-size:12px;}');
 
$flashChart->axis('x', array('3d' => 5));
$flashChart->axis('y', array('range' => array(0, $by_month_settings['by_month_max'], $by_month_settings['by_month_step'])));
 
$flashChart->renderData('bar_3d', array('colour' => '#1f44ff'));
$flashChart->render(900,300);

echo '<br /><br /><br /><br />';

/**
 * 
 * Draw chart by year
 * 
 */
$flashChart = Yii::createComponent('application.extensions.ofc2.EOFC2');
 
$flashChart->begin('by_year');
$flashChart->setTitle(Yii::t('admin_v2', 'Published Ads By Year'),'{color:#000; font-size:15px; padding-bottom:20px;}');

$flashChart->setData($by_year);
$flashChart->setNumbersPath('{n}.Year.count');
$flashChart->setLabelsPath('default.{n}.Year.date');
 
$flashChart->setLegend('x', Yii::t('admin_v2', 'Date'), '{color:#000; font-size:12px;}');
$flashChart->setLegend('y', Yii::t('admin_v2', 'Ads Count'), '{color:#000; font-size:12px;}');
 
$flashChart->axis('x',array('3d' => 5));
$flashChart->axis('y', array('range' => array(0, $by_year_settings['by_year_max'], $by_year_settings['by_year_step'])));
 
$flashChart->renderData('bar_3d', array('colour' => '#1f44ff'));
$flashChart->render(900,300);