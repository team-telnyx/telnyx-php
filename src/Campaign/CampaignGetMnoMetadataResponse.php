<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Campaign\CampaignGetMnoMetadataResponse\10999 as 109991;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
  * @phpstan-type campaign_get_mno_metadata_response = array{10999?: 109991}
  * 
  * 
  * When used in a response, this type parameter can be used to define a $rawResponse property.
  * @template TRawResponse of object = object{}
  * @mixin TRawResponse
  * 
 */
final class CampaignGetMnoMetadataResponse implements BaseModel
{
  /** @use SdkModel<campaign_get_mno_metadata_response> */
  use SdkModel;

  /** @var 109991|null $10999 */
  #[Api(optional: true)]
  public ?109991 $10999;

  /**  */
  public function __construct(){$this->initialize();}

  /**
  * Construct an instance from the required parameters.
  * 
  * You must use named parameters to construct any parameters with a default value.
  * 
  * @param 109991 $10999
  * 
  * @return self
 */
  public static function with(109991 $10999 = null): self {
    $obj = new self;

    null !== $10999 && $obj->10999 = $10999;

    return $obj;
  }

  /**
  * @param 109991 $10999
  * 
  * @return self
 */
  public function with10999(109991 $10999): self {
    $obj = clone $this;
    $obj->10999 = $10999;
    return $obj;
  }
}