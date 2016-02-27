<?php

namespace Tourism\value_objects ;

/**
 * Class ResponseMessages
 * @package bidbarg\ValueObjects
 */
/**
 * Class ResponseMessages
 * @package bidbarg\ValueObjects
 */
/**
 * Class ResponseMessages
 * @package bidbarg\ValueObjects
 */
class ResponseMessages
{

    /**
     * Invalid credentials key
     *
     * @var string
     */
    const INVALID_CREDENTIALS = 'invalid_credentials';

    /**
     * User has been created
     *
     * @var string
     */
    const USER_CREATED = 'user_created';

    /**
     *
     *
     * @var string
     */
    const TOKEN_NOT_FOUND = 'token_not_found';

    /**
     *
     * @var string
     */
    const EMAIL_CONFIRMED = 'email_confirmed';

    /**
     *
     * @var string
     */
    const USER_NOT_FOUND = 'user_not_found';

    /**
     *
     * @var string
     */
    const CONFIRMED_BEFORE = 'confirmed_before';

    /**
     *
     * @var string
     */
    const PASSWORD_CHANGED = 'password_changed';

    /**
     *
     * @var string
     */
    const TOKEN_VALID = 'token_valid';

    /**
     * @param $code
     * @return string
     */

    /**
     * Entity has been created
     *
     * @var string
     */
    const CREATED = 'created';

    /**
     * Entity not found
     *
     * @var string
     */
    const NOT_FOUND = 'not_found';

    /**
     *
     */
    const FOUND = 'found';


    /**
     * Entity not updated
     *
     * @var string
     */
    const UPDATED = 'updated';
    /**
     * Entity not updated
     *
     * @var string
     */
    const DELETED = 'deleted';

    /**
     * @var String
     */
    const RESTORED = 'restored';

    /**
     * Entity is  exist
     *
     * @var string
     */
    const EXIST = 'exist';
    /**
     * Image is  exist
     *
     * @var string
     */
    const Image_Exist = 'image_exist';
    /**
     * Audio is  exist
     *
     * @var string
     */
    const Audio_Exist = 'audio_exist';
    /**
     * Video is  exist
     *
     * @var string
     */
    const Video_Exist = 'video_exist';
    /**
     * media is  not allowed
     *
     * @var string
     */
    const Media_Type_Not_Allowed = 'media_type_not_allowed';
    /**
     * media is  not allowed
     *
     * @var string
     */
    const Storage_Is_Not_WriteAble = 'storage_is_not_writeAble';



    const TAGS_ARE_NOT_VALID = 'tags_empty_or_not_exist_in_database';

    /**
     * @var string
     */
    const CATEGORIES_INVALID = 'categories_empty_or_not_exist_in_database';

    /**
     * @var string
     */
    const MEDIAS_INVALID = 'medias_empty_or_not_exist_in_database';

    /**
     * Entity is  exist
     *
     * @var string
     */
    const SLUG_EXIST = 'slug_exist';


    /**
     *
     */
    const JUS_GET_DEFINED_FIELDS = "just_get_defined_fields";

    /**
     *
     */
    const REQUEST_HAS_NO_FILE = "request_has_no_file";
    /**
     *
     */
    const EMAIL_REGISTERED_TO_NEWS_LETTER = "email_registered_to_news_letter";

    /**
     *
     */
    const OLD_PASSWORD_IS_NOT_VALID = "old_password_is_not_valid";

    /**
     * @param $code
     * @return string
     */
    public static function getMessageFromCode($code)
    {
        return trans('messages.' . $code);
    }

}