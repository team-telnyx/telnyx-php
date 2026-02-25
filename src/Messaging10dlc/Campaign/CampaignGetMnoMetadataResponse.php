<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Campaign;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging10dlc\Campaign\CampaignGetMnoMetadataResponse\Mno10999;

/**
 * @phpstan-import-type Mno10999Shape from \Telnyx\Messaging10dlc\Campaign\CampaignGetMnoMetadataResponse\Mno10999
 *
 * @phpstan-type CampaignGetMnoMetadataResponseShape = array{
 *   mno10999?: null|Mno10999|Mno10999Shape
 * }
 */
final class CampaignGetMnoMetadataResponse implements BaseModel
{
    /** @use SdkModel<CampaignGetMnoMetadataResponseShape> */
    use SdkModel;

    #[Optional('10999')]
    public ?Mno10999 $mno10999;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Mno10999|Mno10999Shape|null $mno10999
     */
    public static function with(Mno10999|array|null $mno10999 = null): self
    {
        $self = new self;

        null !== $mno10999 && $self['mno10999'] = $mno10999;

        return $self;
    }

    /**
     * @param Mno10999|Mno10999Shape $mno10999
     */
    public function withMno10999(Mno10999|array $mno10999): self
    {
        $self = clone $this;
        $self['mno10999'] = $mno10999;

        return $self;
    }
}
