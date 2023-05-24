<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Attributes\SexagenaryTermAttribute;

#[SexagenaryTermAttribute(1, 'a', 3, 2, ['quy_nhan', 'quy'])]
#[SexagenaryTermAttribute(2, 'b', 2, 2, ['dang_xa', 'xa'])]
#[SexagenaryTermAttribute(3, 'c', 2, 1, ['chu_tuoc', 'tuoc'])]
#[SexagenaryTermAttribute(4, 'd', 1, 2, ['thien_hop', 'hop'])]
#[SexagenaryTermAttribute(5, 'e', 3, 1, ['cau_tran', 'cau'])]
#[SexagenaryTermAttribute(6, 'f', 1, 1, ['thanh_long', 'long'])]
#[SexagenaryTermAttribute(7, 'g', 3, 1, ['thien_khong', 'khong'])]
#[SexagenaryTermAttribute(8, 'h', 4, 1, ['bach_ho', 'ho'])]
#[SexagenaryTermAttribute(9, 'i', 3, 2, ['thai_thuong', 'thuong'])]
#[SexagenaryTermAttribute(10, 'j', 5, 2, ['huyen_vu', 'vu'])]
#[SexagenaryTermAttribute(11, 'k', 4, 2, ['thai_am', 'am'])]
#[SexagenaryTermAttribute(12, 'l', 5, 1, ['thien_hau', 'hau'])]
class StarTerm extends AbstractSexagenaryTerm
{

}