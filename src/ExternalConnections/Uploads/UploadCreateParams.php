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
 * Creates a new Upload request to Microsoft teams with the included phone numbers. Only one of civic_address_id or location_id must be provided, not both. The maximum allowed phone numbers for the numbers_ids array is 1000.
 *
 * @see Telnyx\ExternalConnections\Uploads->create
 *
 * @phpstan-type UploadCreateParamsShape = array{
 *   number_ids: list<string>,
 *   additional_usages?: list<AdditionalUsage|value-of<AdditionalUsage>>,
 *   civic_address_id?: string,
 *   location_id?: string,
 *   usage?: Usage|value-of<Usage>,
 * }
 */
final class UploadCreateParams implements BaseModel
{
    /** @use SdkModel<UploadCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $number_ids */
    #[Api(list: 'string')]
    public array $number_ids;

    /** @var list<value-of<AdditionalUsage>>|null $additional_usages */
    #[Api(list: AdditionalUsage::class, optional: true)]
    public ?array $additional_usages;

    /**
     * Identifies the civic address to assign all phone numbers to.
     */
    #[Api(optional: true)]
    public ?string $civic_address_id;

    /**
     * Identifies the location to assign all phone numbers to.
     */
    #[Api(optional: true)]
    public ?string $location_id;

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
     * UploadCreateParams::with(number_ids: ...)
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
     * @param list<string> $number_ids
     * @param list<AdditionalUsage|value-of<AdditionalUsage>> $additional_usages
     * @param Usage|value-of<Usage> $usage
     */
    public static function with(
        array $number_ids,
        ?array $additional_usages = null,
        ?string $civic_address_id = null,
        ?string $location_id = null,
        Usage|string|null $usage = null,
    ): self {
        $obj = new self;

        $obj->number_ids = $number_ids;

        null !== $additional_usages && $obj['additional_usages'] = $additional_usages;
        null !== $civic_address_id && $obj->civic_address_id = $civic_address_id;
        null !== $location_id && $obj->location_id = $location_id;
        null !== $usage && $obj['usage'] = $usage;

        return $obj;
    }

    /**
     * @param list<string> $numberIDs
     */
    public function withNumberIDs(array $numberIDs): self
    {
        $obj = clone $this;
        $obj->number_ids = $numberIDs;

        return $obj;
    }

    /**
     * @param list<AdditionalUsage|value-of<AdditionalUsage>> $additionalUsages
     */
    public function withAdditionalUsages(array $additionalUsages): self
    {
        $obj = clone $this;
        $obj['additional_usages'] = $additionalUsages;

        return $obj;
    }

    /**
     * Identifies the civic address to assign all phone numbers to.
     */
    public function withCivicAddressID(string $civicAddressID): self
    {
        $obj = clone $this;
        $obj->civic_address_id = $civicAddressID;

        return $obj;
    }

    /**
     * Identifies the location to assign all phone numbers to.
     */
    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj->location_id = $locationID;

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
        $obj['usage'] = $usage;

        return $obj;
    }
}
