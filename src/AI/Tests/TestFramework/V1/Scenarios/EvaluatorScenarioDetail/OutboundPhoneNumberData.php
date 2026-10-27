<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios\EvaluatorScenarioDetail;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OutboundPhoneNumberDataShape = array{
 *   id?: int|null, number?: string|null, phoneNumberID?: string|null
 * }
 */
final class OutboundPhoneNumberData implements BaseModel
{
    /** @use SdkModel<OutboundPhoneNumberDataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $number;

    #[Optional('phone_number_id')]
    public ?string $phoneNumberID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $id = null,
        ?string $number = null,
        ?string $phoneNumberID = null
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $number && $self['number'] = $number;
        null !== $phoneNumberID && $self['phoneNumberID'] = $phoneNumberID;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withNumber(string $number): self
    {
        $self = clone $this;
        $self['number'] = $number;

        return $self;
    }

    public function withPhoneNumberID(string $phoneNumberID): self
    {
        $self = clone $this;
        $self['phoneNumberID'] = $phoneNumberID;

        return $self;
    }
}
