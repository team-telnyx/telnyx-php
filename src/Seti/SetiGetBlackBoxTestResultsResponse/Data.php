<?php

declare(strict_types=1);

namespace Telnyx\Seti\SetiGetBlackBoxTestResultsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Seti\SetiGetBlackBoxTestResultsResponse\Data\BlackBoxTest;

/**
 * @phpstan-import-type BlackBoxTestShape from \Telnyx\Seti\SetiGetBlackBoxTestResultsResponse\Data\BlackBoxTest
 *
 * @phpstan-type DataShape = array{
 *   blackBoxTests?: list<BlackBoxTestShape>|null,
 *   product?: string|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<BlackBoxTest>|null $blackBoxTests */
    #[Optional('black_box_tests', list: BlackBoxTest::class)]
    public ?array $blackBoxTests;

    /**
     * The product associated with the black box test group.
     */
    #[Optional]
    public ?string $product;

    #[Optional('record_type')]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<BlackBoxTestShape>|null $blackBoxTests
     */
    public static function with(
        ?array $blackBoxTests = null,
        ?string $product = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $blackBoxTests && $self['blackBoxTests'] = $blackBoxTests;
        null !== $product && $self['product'] = $product;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param list<BlackBoxTestShape> $blackBoxTests
     */
    public function withBlackBoxTests(array $blackBoxTests): self
    {
        $self = clone $this;
        $self['blackBoxTests'] = $blackBoxTests;

        return $self;
    }

    /**
     * The product associated with the black box test group.
     */
    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
