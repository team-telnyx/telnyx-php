<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Campaign\CampaignGetMnoMetadataResponse\10999;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
  * @phpstan-type campaign_get_mno_metadata_response = array{_10999?: 10999}
  * 
  * 
  * When used in a response, this type parameter can define a $rawResponse property.
  * @template TRawResponse of object = object{}
  * @mixin TRawResponse
  * 
 */
final class CampaignGetMnoMetadataResponse implements BaseModel
{
  /** @use SdkModel<campaign_get_mno_metadata_response> */
  use SdkModel;

  /** @var 10999|null $_10999 */
  #[Api("10999", optional: true)]
  public ?10999 $_10999;

  /**  */
  public function __construct(){$this->initialize();}

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param 10999 $_10999
  * 
  * @return self
 */
  public static function with(10999 $_10999 = null): self {
    $obj = new self;

    null !== $_10999 && $obj->_10999 = $_10999;

    return $obj;
  }

  /**
  * @param 10999 $_10999
  * 
  * @return self
 */
  public function with10999(10999 $_10999): self {
    $obj = clone $this;
    $obj->_10999 = $_10999;
    return $obj;
  }
}