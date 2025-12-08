<?php

declare(strict_types=1);

namespace Telnyx\Requirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType;
use Telnyx\Requirements\RequirementGetResponse\Data;
use Telnyx\Requirements\RequirementGetResponse\Data\Action;
use Telnyx\Requirements\RequirementGetResponse\Data\PhoneNumberType;

/**
 * @phpstan-type RequirementGetResponseShape = array{data?: Data|null}
 */
final class RequirementGetResponse implements BaseModel
{
    /** @use SdkModel<RequirementGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   country_code?: string|null,
     *   created_at?: string|null,
     *   locality?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     *   requirements_types?: list<DocReqsRequirementType>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   country_code?: string|null,
     *   created_at?: string|null,
     *   locality?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     *   requirements_types?: list<DocReqsRequirementType>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
