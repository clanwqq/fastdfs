<?php
 echo fastdfs_client_version() . "\n";

 $file_info = fastdfs_storage_upload_appender_by_filename("/usr/include/stdio.h");
 if (!$file_info)
 {
	echo "fastdfs_storage_upload_appender_by_filename fail, errno: " . fastdfs_get_last_error_no() . ", error info: " . fastdfs_get_last_error_info() . "\n";
	exit;
 }

 $group_name = $file_info['group_name'];
 $remote_filename = $file_info['filename'];

 var_dump($file_info);
 $file_id = "$group_name/$remote_filename";
 var_dump(fastdfs_get_file_info($file_id));

 $appender_filename = $remote_filename;
 echo "file id: $group_name/$appender_filename\n";
 if (!fastdfs_storage_append_by_filename("/usr/include/stdlib.h", $group_name, $appender_filename))
 {
	echo "fastdfs_storage_append_by_filename fail, errno: " . fastdfs_get_last_error_no() . ", error info: " . fastdfs_get_last_error_info() . "\n";
	exit;
 }

 var_dump(fastdfs_get_file_info($file_id));


 $fdfs = new FastDFS();
 $file_info = $fdfs->storage_upload_appender_by_filename("/usr/include/stdio.h");
 if (!$file_info)
 {
	echo "$fdfs->storage_upload_appender_by_filename fail, errno: " . $fdfs->get_last_error_no() . ", error info: " . $fdfs->get_last_error_info() . "\n";
	exit;
 }

 $group_name = $file_info['group_name'];
 $remote_filename = $file_info['filename'];

 var_dump($file_info);
 $file_id = "$group_name/$remote_filename";
 var_dump($fdfs->get_file_info($file_id));

 $appender_filename = $remote_filename;
 echo "file id: $group_name/$appender_filename\n";
 if (!$fdfs->storage_append_by_filename("/usr/include/stdlib.h", $group_name, $appender_filename))
 {
	echo "$fdfs->storage_append_by_filename fail, errno: " . $fdfs->get_last_error_no() . ", error info: " . $fdfs->get_last_error_info() . "\n";
	exit;
 }

 var_dump($fdfs->get_file_info($file_id));

 echo 'tracker_close_all_connections result: ' . $fdfs->tracker_close_all_connections() . "\n";
?>