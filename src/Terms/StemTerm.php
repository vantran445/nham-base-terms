<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Attributes\SexagenaryTermAttribute;

#[SexagenaryTermAttribute(1, 'a', 1, 1, ['giap', 'forest'])]
#[SexagenaryTermAttribute(2, 'b', 1, 2, ['at', 'grass'])]
#[SexagenaryTermAttribute(3, 'c', 2, 1, ['binh', 'firepower'])]
#[SexagenaryTermAttribute(4, 'd', 2, 2, ['dinh', 'sparks'])]
#[SexagenaryTermAttribute(5, 'e', 3, 1, ['mau', 'fertile'])]
#[SexagenaryTermAttribute(6, 'f', 3, 2, ['ky', 'barren'])]
#[SexagenaryTermAttribute(7, 'g', 4, 1, ['canh', 'hard_metal'])]
#[SexagenaryTermAttribute(8, 'h', 4, 2, ['tan', 'metal_ores'])]
#[SexagenaryTermAttribute(9, 'i', 5, 1, ['nham', 'ocean'])]
#[SexagenaryTermAttribute(10, 'j', 5, 2, ['quy', 'rain_water'])]
class StemTerm extends AbstractSexagenaryTerm
{

}