<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\Status\Eq;

/**
 * @phpstan-type status_alias = array{eq?: list<value-of<Eq>>}
 */
final class Status implements BaseModel
{
    /** @use SdkModel<status_alias> */
    use SdkModel;

    /**
     * The status of the release to filter by.
     *
     * @var list<value-of<Eq>>|null $eq
     */
    #[Api(list: Eq::class, optional: true)]
    public ?array $eq;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Eq|value-of<Eq>> $eq
     */
    public static function with(?array $eq = null): self
    {
        $obj = new self;

        null !== $eq && $obj['eq'] = $eq;

        return $obj;
    }

    /**
     * The status of the release to filter by.
     *
     * @param list<Eq|value-of<Eq>> $eq
     */
    public function withEq(array $eq): self
    {
        $obj = clone $this;
        $obj['eq'] = $eq;

        return $obj;
    }
}
