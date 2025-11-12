<?php

declare(strict_types=1);

namespace Telnyx\Actions\Register;

use Telnyx\Actions\Register\RegisterCreateParams\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Register the SIM cards associated with the provided registration codes to the current user's account.<br/><br/>
 * If <code>sim_card_group_id</code> is provided, the SIM cards will be associated with that group. Otherwise, the default group for the current user will be used.<br/><br/>.
 *
 * @see Telnyx\Services\Actions\RegisterService::create()
 *
 * @phpstan-type RegisterCreateParamsShape = array{
 *   registration_codes: list<string>,
 *   sim_card_group_id?: string,
 *   status?: Status|value-of<Status>,
 *   tags?: list<string>,
 * }
 */
final class RegisterCreateParams implements BaseModel
{
    /** @use SdkModel<RegisterCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $registration_codes */
    #[Api(list: 'string')]
    public array $registration_codes;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Api(optional: true)]
    public ?string $sim_card_group_id;

    /**
     * Status on which the SIM card will be set after being successful registered.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Searchable tags associated with the SIM card.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    /**
     * `new RegisterCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RegisterCreateParams::with(registration_codes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RegisterCreateParams)->withRegistrationCodes(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $registration_codes
     * @param Status|value-of<Status> $status
     * @param list<string> $tags
     */
    public static function with(
        array $registration_codes,
        ?string $sim_card_group_id = null,
        Status|string|null $status = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        $obj->registration_codes = $registration_codes;

        null !== $sim_card_group_id && $obj->sim_card_group_id = $sim_card_group_id;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj->tags = $tags;

        return $obj;
    }

    /**
     * @param list<string> $registrationCodes
     */
    public function withRegistrationCodes(array $registrationCodes): self
    {
        $obj = clone $this;
        $obj->registration_codes = $registrationCodes;

        return $obj;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $obj = clone $this;
        $obj->sim_card_group_id = $simCardGroupID;

        return $obj;
    }

    /**
     * Status on which the SIM card will be set after being successful registered.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Searchable tags associated with the SIM card.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj->tags = $tags;

        return $obj;
    }
}
