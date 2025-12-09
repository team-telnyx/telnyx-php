<?php

declare(strict_types=1);

namespace Telnyx\Actions\Register;

use Telnyx\Actions\Register\RegisterCreateParams\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
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
 *   registrationCodes: list<string>,
 *   simCardGroupID?: string,
 *   status?: Status|value-of<Status>,
 *   tags?: list<string>,
 * }
 */
final class RegisterCreateParams implements BaseModel
{
    /** @use SdkModel<RegisterCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $registrationCodes */
    #[Required('registration_codes', list: 'string')]
    public array $registrationCodes;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Optional('sim_card_group_id')]
    public ?string $simCardGroupID;

    /**
     * Status on which the SIM card will be set after being successful registered.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Searchable tags associated with the SIM card.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * `new RegisterCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RegisterCreateParams::with(registrationCodes: ...)
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
     * @param list<string> $registrationCodes
     * @param Status|value-of<Status> $status
     * @param list<string> $tags
     */
    public static function with(
        array $registrationCodes,
        ?string $simCardGroupID = null,
        Status|string|null $status = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        $obj['registrationCodes'] = $registrationCodes;

        null !== $simCardGroupID && $obj['simCardGroupID'] = $simCardGroupID;
        null !== $status && $obj['status'] = $status;
        null !== $tags && $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * @param list<string> $registrationCodes
     */
    public function withRegistrationCodes(array $registrationCodes): self
    {
        $obj = clone $this;
        $obj['registrationCodes'] = $registrationCodes;

        return $obj;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $obj = clone $this;
        $obj['simCardGroupID'] = $simCardGroupID;

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
        $obj['tags'] = $tags;

        return $obj;
    }
}
