<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace daan_info_web{
/**
 * daan_info_web\Gradeinfo
 *
 * @property integer $gradeidno
 * @property string $gradeno
 * @property string $teacherno
 * @property string $content
 */
	class Gradeinfo {}
}

namespace daan_info_web{
/**
 * daan_info_web\Question
 *
 */
	class Question {}
}

namespace daan_info_web{
/**
 * daan_info_web\Scoorelistno
 *
 */
	class Scoorelistno {}
}

namespace daan_info_web{
/**
 * daan_info_web\Student
 *
 * @property integer $idno
 * @property string $stuno
 * @property string $stuname
 */
	class Student {}
}

namespace daan_info_web{
/**
 * daan_info_web\Stuscoore
 *
 * @property integer $idno
 * @property string $stuno
 * @property string $scoorelistidno
 * @property integer $scoore
 */
	class Stuscoore {}
}

namespace daan_info_web{
/**
 * daan_info_web\Teacher
 *
 * @property integer $idno
 * @property string $teacherno
 * @property string $groupno
 */
	class Teacher {}
}

namespace daan_info_web{
/**
 * daan_info_web\Teacherlist
 *
 * @property integer $idno
 * @property string $teachername
 */
	class Teacherlist {}
}

namespace daan_info_web{
/**
 * daan_info_web\Topicgroup
 *
 */
	class Topicgroup {}
}

namespace daan_info_web{
/**
 * daan_info_web\Topicinfo
 *
 * @property integer $idno
 * @property string $groupno
 * @property integer $postnum
 * @property string $topictitle
 * @property string $topickeyword
 * @property string $topictype
 * @property string $lastdate
 * @property string $topiccontent
 * @property string $pptpos
 * @property string $pdfpos
 * @property string $wmvpos
 * @property string $datpos
 * @property string $lastadmin
 * @property integer $topicsco
 * @property integer $topicvediosco
 */
	class Topicinfo {}
}

namespace daan_info_web{
/**
 * daan_info_web\Topictype
 *
 * @property integer $id
 * @property string $typename
 */
	class Topictype {}
}

namespace daan_info_web{
/**
 * daan_info_web\User
 *
 * @property integer $idno
 * @property string $acc
 * @property string $acc_id
 * @property string $password
 * @property string $memberno
 * @property string $category
 */
	class User {}
}

