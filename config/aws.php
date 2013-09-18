<?php defined('SYSPATH') OR die('No direct script access.');
/**
 * You can share the same configuration file with what the instance is currently using
 * via environment variables.
 *
 * return parse_ini_file($_SERVER['AWS_CONFIG']);
 *
 * Remember to set the proper permission to the config file.
 */
$DEFAULT = array(
    'key'    => null,
    'secret' => null,
    
    // http://docs.aws.amazon.com/general/latest/gr/rande.html
    'region' => 'ap-southeast-1'
);

/**
 * Load from environments
 */
if (!empty($_SERVER['AWS_CONFIG']))
{
    $aws    = parse_ini_file($_SERVER['AWS_CONFIG']);
    
    // Your Access Key Id
    if (!empty($aws['AWSAccessKeyId']))
    {
        $DEFAULT['key'] = $aws['AWSAccessKeyId'];
        unset($aws['AWSAccessKeyId']);
    }
    
    // Your Access Key Id
    if (!empty($aws['AWSSecretKey']))
    {
        $DEFAULT['secret'] = $aws['AWSSecretKey'];
        unset($aws['AWSSecretKey']);
    }
    
    $DEFAULT = Arr::merge($DEFAULT, $aws);
}

/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

return array(
    'class' => 'Aws\Common\Aws',
    
    'default' => $DEFAULT,
    'services' => array(
        
        'default_settings' =>  array(
            'params' => $DEFAULT,
        ),
        
        'autoscaling' => array(
            'alias'   => 'AutoScaling',
            'extends' => 'default_settings',
            'class'   => 'Aws\AutoScaling\AutoScalingClient'
        ),

        'cloudformation' => array(
            'alias'   => 'CloudFormation',
            'extends' => 'default_settings',
            'class'   => 'Aws\CloudFormation\CloudFormationClient'
        ),

        'cloudfront' => array(
            'alias'   => 'CloudFront',
            'extends' => 'default_settings',
            'class'   => 'Aws\CloudFront\CloudFrontClient'
        ),

        'cloudfront_20120505' => array(
            'extends' => 'cloudfront',
            'params' => array(
                'version' => '2012-05-05'
            )
        ),

        'cloudsearch' => array(
            'alias'   => 'CloudSearch',
            'extends' => 'default_settings',
            'class'   => 'Aws\CloudSearch\CloudSearchClient'
        ),

        'cloudwatch' => array(
            'alias'   => 'CloudWatch',
            'extends' => 'default_settings',
            'class'   => 'Aws\CloudWatch\CloudWatchClient'
        ),

        'datapipeline' => array(
            'alias'   => 'DataPipeline',
            'extends' => 'default_settings',
            'class'   => 'Aws\DataPipeline\DataPipelineClient'
        ),

        'directconnect' => array(
            'alias'   => 'DirectConnect',
            'extends' => 'default_settings',
            'class'   => 'Aws\DirectConnect\DirectConnectClient'
        ),

        'dynamodb' => array(
            'alias'   => 'DynamoDb',
            'extends' => 'default_settings',
            'class'   => 'Aws\DynamoDb\DynamoDbClient'
        ),

        'dynamodb_20111205' => array(
            'extends' => 'dynamodb',
            'params' => array(
                'version' => '2011-12-05'
            )
        ),

        'ec2' => array(
            'alias'   => 'Ec2',
            'extends' => 'default_settings',
            'class'   => 'Aws\Ec2\Ec2Client'
        ),

        'elasticache' => array(
            'alias'   => 'ElastiCache',
            'extends' => 'default_settings',
            'class'   => 'Aws\ElastiCache\ElastiCacheClient'
        ),

        'elasticbeanstalk' => array(
            'alias'   => 'ElasticBeanstalk',
            'extends' => 'default_settings',
            'class'   => 'Aws\ElasticBeanstalk\ElasticBeanstalkClient'
        ),

        'elasticloadbalancing' => array(
            'alias'   => 'ElasticLoadBalancing',
            'extends' => 'default_settings',
            'class'   => 'Aws\ElasticLoadBalancing\ElasticLoadBalancingClient'
        ),

        'elastictranscoder' => array(
            'alias'   => 'ElasticTranscoder',
            'extends' => 'default_settings',
            'class'   => 'Aws\ElasticTranscoder\ElasticTranscoderClient'
        ),

        'emr' => array(
            'alias'   => 'Emr',
            'extends' => 'default_settings',
            'class'   => 'Aws\Emr\EmrClient'
        ),

        'glacier' => array(
            'alias'   => 'Glacier',
            'extends' => 'default_settings',
            'class'   => 'Aws\Glacier\GlacierClient'
        ),

        'iam' => array(
            'alias'   => 'Iam',
            'extends' => 'default_settings',
            'class'   => 'Aws\Iam\IamClient'
        ),

        'importexport' => array(
            'alias'   => 'ImportExport',
            'extends' => 'default_settings',
            'class'   => 'Aws\ImportExport\ImportExportClient'
        ),

        'opsworks' => array(
            'alias'   => 'OpsWorks',
            'extends' => 'default_settings',
            'class'   => 'Aws\OpsWorks\OpsWorksClient'
        ),

        'rds' => array(
            'alias'   => 'Rds',
            'extends' => 'default_settings',
            'class'   => 'Aws\Rds\RdsClient'
        ),

        'redshift' => array(
            'alias'   => 'Redshift',
            'extends' => 'default_settings',
            'class'   => 'Aws\Redshift\RedshiftClient'
        ),

        'route53' => array(
            'alias'   => 'Route53',
            'extends' => 'default_settings',
            'class'   => 'Aws\Route53\Route53Client'
        ),

        's3' => array(
            'alias'   => 'S3',
            'extends' => 'default_settings',
            'class'   => 'Aws\S3\S3Client'
        ),

        'sdb' => array(
            'alias'   => 'SimpleDb',
            'extends' => 'default_settings',
            'class'   => 'Aws\SimpleDb\SimpleDbClient'
        ),

        'ses' => array(
            'alias'   => 'Ses',
            'extends' => 'default_settings',
            'class'   => 'Aws\Ses\SesClient'
        ),

        'sns' => array(
            'alias'   => 'Sns',
            'extends' => 'default_settings',
            'class'   => 'Aws\Sns\SnsClient'
        ),

        'sqs' => array(
            'alias'   => 'Sqs',
            'extends' => 'default_settings',
            'class'   => 'Aws\Sqs\SqsClient'
        ),

        'storagegateway' => array(
            'alias'   => 'StorageGateway',
            'extends' => 'default_settings',
            'class'   => 'Aws\StorageGateway\StorageGatewayClient'
        ),

        'sts' => array(
            'alias'   => 'Sts',
            'extends' => 'default_settings',
            'class'   => 'Aws\Sts\StsClient'
        ),

        'support' => array(
            'alias'   => 'Support',
            'extends' => 'default_settings',
            'class'   => 'Aws\Support\SupportClient'
        ),

        'swf' => array(
            'alias'   => 'Swf',
            'extends' => 'default_settings',
            'class'   => 'Aws\Swf\SwfClient'
        ),
    )
);