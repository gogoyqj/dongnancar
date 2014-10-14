imgs=`find ../img/* ! -name "*.swf"`
for img in $imgs;
    do name=`echo $img|sed "s/\(\.\.\/\|img\/\|\.[a-z]*\)//g"`;
    newName=`echo $name|sed "s/^sy/index_/g"|sed "s/cneter/center/g"|sed "s/\(_bg\|_bj\|bg\|bj\)/_bg/g"|sed "s/ico_a1/arrow_right_t1/g"|sed "s/jt_ico/arrow_right/g"|sed "s/span1/divider/g"|sed "s/nav_list_bg2_middle/index_nav_bg/g"|sed "s/newsleft/arrow_right_t2/g"|sed "s/car/item/g";`
    mv $img `sed "s/$name/$newName/g"`
    sed -i "s/${name}/${newName}/g" main.css
done
