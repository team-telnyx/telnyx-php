<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\AdditionalUsage;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams\Usage;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UploadCreateParams); // set properties as needed
 * $client->externalConnections.uploads->create(...$params->toArray());
 * ```
 * Creates a new Upload request to Microsoft teams with the included phone numbers. Only one of civic_address_id or location_id must be provided, not both. The maximum allowed phone numbers for the numbers_ids array is 1000.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->externalConnections.uploads->create(...$params->toArray());`
 *
 * @see Telnyx\ExternalConnections\Uploads->create
 *
 * @phpstan-type upload_create_params = array{
 *   numberIDs: list<string>,
 *   additionalUsages?: list<AdditionalUsage|value-of<AdditionalUsage>>,
 *   civicAddressID?: string,
 *   locationID?: string,
 *   usage?: Usage|value-of<Usage>,
 * }
 */
final class UploadCreateParams implements BaseModel
{
    /** @use SdkModel<upload_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $numberIDs */
    #[Api('number_ids', list: 'string')]
    public array $numberIDs;

    /** @var list<value-of<AdditionalUsage>>|null $additionalUsages */
    #[Api('additional_usages', list: AdditionalUsage::class, optional: true)]
    public ?array $additionalUsages;

    /**
     * Identifies the civic address to assign all phone numbers to.
     */
    #[Api('civic_address_id', optional: true)]
    public ?string $civicAddressID;

    /**
     * Identifies the location to assign all phone numbers to.
     */
    #[Api('location_id', optional: true)]
    public ?string $locationID;

    /**
     * The use case of the upload request. NOTE: `calling_user_assignment` is not supported for toll free numbers.
     *
     * @var value-of<Usage>|null $usage
     */
    #[Api(enum: Usage::class, optional: true)]
    public ?string $usage;

    /**
     * `new UploadCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UploadCreateParams::with(numberIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UploadCreateParams)->withNumberIDs(...)
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
     * @param list<string> $numberIDs
     * @param list<AdditionalUsage|value-of<AdditionalUsage>> $additionalUsages
     * @param Usage|value-of<Usage> $usage
     */
    public static function with(
        array $numberIDs,
        ?array $additionalUsages = null,
        ?string $civicAddressID = null,
        ?string $locationID = null,
        Usage|string|null $usage = null,
    ): self {
        $obj = new self;

        $obj->numberIDs = $numberIDs;

        null !== $additionalUsages && $obj->additionalUsages = array_map(fn ($v) => $v instanceof AdditionalUsage ? $v->value : $v, $additionalUsages);
        null !== $civicAddressID && $obj->civicAddressID = $civicAddressID;
        null !== $locationID && $obj->locationID = $locationID;
        null !== $usage && $obj->usage = $usage instanceof Usage ? $usage->value : $usage;

        return $obj;
    }

    /**
     * @param list<string> $numberIDs
     */
    public function withNumberIDs(array $numberIDs): self
    {
        $obj = clone $this;
        $obj->numberIDs = $numberIDs;

        return $obj;
    }

    /**
     * @param list<AdditionalUsage|value-of<AdditionalUsage>> $additionalUsages
     */
    public function withAdditionalUsages(array $additionalUsages): self
    {
        $obj = clone $this;
        $obj->additionalUsages = array_map(fn ($v) => $v instanceof AdditionalUsage ? $v->value : $v, $additionalUsages);

        return $obj;
    }

    /**
     * Identifies the civic address to assign all phone numbers to.
     */
    public function withCivicAddressID(string $civicAddressID): self
    {
        $obj = clone $this;
        $obj->civicAddressID = $civicAddressID;

        return $obj;
    }

    /**
     * Identifies the location to assign all phone numbers to.
     */
    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj->locationID = $locationID;

        return $obj;
    }

    /**
     * The use case of the upload request. NOTE: `calling_user_assignment` is not supported for toll free numbers.
     *
     * @param Usage|value-of<Usage> $usage
     */
    public function withUsage(Usage|string $usage): self
    {
        $obj = clone $this;
        $obj->usage = $usage instanceof Usage ? $usage->value : $usage;

        return $obj;
    }
}
