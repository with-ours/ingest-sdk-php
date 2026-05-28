<?php

declare(strict_types=1);

namespace OursPrivacy\Experiments;

use OursPrivacy\Core\Concerns\SdkUnion;
use OursPrivacy\Core\Conversion\Contracts\Converter;
use OursPrivacy\Core\Conversion\Contracts\ConverterSource;
use OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember0;
use OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember1;

/**
 * @phpstan-import-type UnionMember0Shape from \OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \OursPrivacy\Experiments\ExperimentAssignmentResponse\UnionMember1
 *
 * @phpstan-type ExperimentAssignmentResponseVariants = UnionMember0|UnionMember1
 * @phpstan-type ExperimentAssignmentResponseShape = ExperimentAssignmentResponseVariants|UnionMember0Shape|UnionMember1Shape
 */
final class ExperimentAssignmentResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [UnionMember0::class, UnionMember1::class];
    }
}
