<?php

declare(strict_types=1);

namespace Telnyx\Actions\Register;

use Telnyx\Actions\Register\RegisterCreateParams\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RegisterCreateParams); // set properties as needed
 * $client->actions.register->create(...$params->toArray());
 * ```
 * Register the SIM cards associated with the provided registration codes to the current user's account.<br/><br/>
 * If <code>sim_card_group_id</code> is provided, the SIM cards will be associated with that group. Otherwise, the default group for the current user will be used.<br/><br/>.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->actions.register->create(...$params->toArray());`
 *
 * @see Telnyx\Actions\Register->create
 *
 * @phpstan-type register_create_params = array{
 *   registrationCodes: list<string>,
 *   simCardGroupID?: string,
 *   status?: Status|value-of<Status>,
 *   tags?: list<string>,
 * }
 */
final class RegisterCreateParams implements BaseModel
{
    /** @use SdkModel<register_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $registrationCodes */
    #[Api('registration_codes', list: 'string')]
    public array $registrationCodes;

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    #[Api('sim_card_group_id', optional: true)]
    public ?string $simCardGroupID;

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

        $obj->registrationCodes = $registrationCodes;

        null !== $simCardGroupID && $obj->simCardGroupID = $simCardGroupID;
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
        $obj->registrationCodes = $registrationCodes;

        return $obj;
    }

    /**
     * The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $obj = clone $this;
        $obj->simCardGroupID = $simCardGroupID;

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
